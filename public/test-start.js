$(document).ready(function(){

    function getQuestion(test,name,testStage, answer, question, questionNo){
        if(questionNo == null){
            questionNo = 0;
        }else{
            questionNo++;
        }

        var questionNo = questionNo.toString();
        $.ajax({
            method:'POST',
            url: '/start_test',
            dataType: 'json',
            data:{"name": name,"test": test, "questionNo":questionNo, "testStage": testStage, "answer":answer, "question":question}
        }).done(function(data){
            $(".error").remove();

            if(data.status === "success") {
                $(".test-wrapper").html(data.content);

                $(".question-form").submit(function (e) {
                    e.preventDefault();

                    var name = $("input[name='name']").val();
                    var test = $("input[name='test']").val();
                    var testStage = $("input[name='testStage']").val();
                    var questionNo = $(".question-form").data('questionno');
                    var answer = $("input[name='answer']").val();
                    var question = $("input[name='question']").val();

                    getQuestion(test, name, testStage, answer, question, questionNo);
                });

                $("button.next-question").click(function(){
                    $(".question-form").submit();
                });

                $(".test-answer").click(function () {
                    var id = $(this).data('id');
                    var answers = $(".test-answer");

                    for (var i = 0; i < answers.length; i++) {
                        $(answers[i]).removeClass('selected-answer')
                    }
                    $(this).addClass('selected-answer');

                    $("input[name='answer']").val(id.toString());
                });
            }
            else{
                for(var i = 0; i < data.errors.length; i++){
                    var field = $("input[name='"+data.errors[i].field+"']");
                    field.after("<div class='error'>" + data.errors[i].msg + "</div>");
                }
            }
        });
    }

    $("form[name='form-get-user']").submit(function(e){
        e.preventDefault();
        var name = $("input[name='name']").val();
        var test =  $("select[name='tests']").val();
        var testStage = $("input[name='testStage']").val();

        getQuestion(test,name, testStage);

    });

    $("button.user-submit").click(function(){
        $("form[name='form-get-user']").submit();
    })
});


