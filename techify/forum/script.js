$(document).ready(function(){

    // like and unlike click
    $(".like, .unlike").click(function(){
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");

        var text = split_id[0];
        var postid = split_id[1];  // postid
        var qid = split_id[2];

        // Finding click type
        var type = 0;
        if(text == "like"){
            type = 1;
        }else{
            type = 2;
        }
        

        // AJAX Request
        $.ajax({
            url: 'likeunlike.php',
            type: 'post',
            data: {postid:postid,type:type,qid:qid},
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+postid+"_"+qid).text(likes);        // setting likes
                $("#unlikes_"+postid+"_"+qid).text(unlikes);    // setting unlikes

                if(type == 1){
                    $("#like_"+postid+"_"+qid).css("color","#ffa449");
                    $("#unlike_"+postid+"_"+qid).css("color","lightseagreen");
                }

                if(type == 2){
                    $("#unlike_"+postid+"_"+qid).css("color","#ffa449");
                    $("#like_"+postid+"_"+qid).css("color","lightseagreen");
                }

            }
        });

    });

});