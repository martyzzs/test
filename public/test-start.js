$(document).ready(function(){

    function getQuestion(test,name,questionNo){

        if(!questionNo){
            questionNo = 0;
        }
        console.log(questionNo);

        $.ajax({
            method:'POST',
            url: test + '/start_test',
            dataType: 'json',
            data:{"name": name,"test": test, "questionNo":questionNo}
        }).done(function(data){

            $(".test-wrapper").html(data.content);

            $(".question-form").submit(function(e){
                e.preventDefault();

                var name = $("input[name='name']").val();
                var test =  $("input[name='test']").val();
                var questionNo = $(".question-form").data('questionno');

                getQuestion(test,name,questionNo);
            });


        });
    }

    $("form[name='form-get-user']").submit(function(e){
        e.preventDefault();
        var name = $("input[name='name']").val();
        var test =  $("select[name='tests']").val();

        if(name.length > 3){
           getQuestion(test,name);
        }
        else{
            $("input[name='name']").addClass('error');
        }
    });
});


