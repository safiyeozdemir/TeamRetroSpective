$(document).ready(function(){


    const tbodyTds = $('tbody tr td');

    $(".field-area textarea").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        //alert(code);
        if (code == 13) {

            tbodyTds.each((index, td) => {
                const tbodyTd = tbodyTds.eq(index);

                if(tbodyTd.data('topic-id') == $(this).data('topic-id'))
                {

                   // tbodyTd.prepend('<section class="topic-idea animate__animated animate__fadeInDown">'+ $(this).val() + '</section>')

                    $.ajax({
                        url: '/comment/create',
                        method: 'POST',
                        dataType: "json",
                        data: {'comment' : $(this).val(), 'commentType' : $(this).data('topic-id')},
                        success: function(response){
                            tbodyTd.prepend('<div class="idea-content" data-comment="'+response['commentId']+'">'+
                                '<section class="topic-idea animate__animated animate__fadeInDown">'+response['comment']+'</section>'+
                                '<button class="idea-action-btn " >'+
                                    '<span id="icon"><i class="far fa-thumbs-up"></i></span>'+
                                '</button>'+

                            '</div>');

                            $('textarea').val('');
                        }
                    });
                }
            });
        }
    });

    $('.ideas').on('click', '.idea-content .idea-action-btn', function(e) {
        $.ajax({
            url: '/comment/like',
            method: 'POST',
            dataType: "json",
            data: {'comment' : $(this).parent().data('comment') },
            success: function(response) {
            },
        });

        $(this).addClass("show");
        $(this).attr('disabled', "disabled");
    });


    $("#btn-finish").click(function (){
        var e = $('.local-message-box .message').innerText;
        $.ajax({
            url: '/comment/vote/control',
            method: 'POST',
            dataType: "json",
            success: function(response) {
                $('.local-message-box .message').empty().prepend(response.error);
                $(".local-message-box").fadeIn("slow");
                $(".local-message-box").fadeOut(5000);
            }
        });
    });



});
/*

if(document.getElementById('btn-finish').clicked === true)
{
    alert("button was clicked");
}
*/

/*
document.getElementById('btn-finish').onclick = function() {
    alert("button was clicked");
}
*/

/*
const likeBtn = document.querySelector(".idea-action-btn ");
let likeIcon = document.querySelector("#icon"),
    count = document.querySelector("#count");

let clicked = false;

/*
likeBtn.addEventListener("click", () => {
    if (!clicked) {
        clicked = true;
        likeIcon.innerHTML = `<i class="fas fa-thumbs-up"></i>`;
        count.textContent++;
    } else {
        clicked = false;
        likeIcon.innerHTML = `<i class="far fa-thumbs-up"></i>`;
        count.textContent--;
    }
});

 */
