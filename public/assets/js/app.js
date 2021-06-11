$(function () {

    const tbodyTds = $('tbody tr td');
    $(".field-area textarea").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {

            tbodyTds.each((index, td) => {
                const tbodyTd = tbodyTds.eq(index);

                if(tbodyTd.data('topic-id') == $(this).data('topic-id'))
                {
                    tbodyTd.prepend('<section class="topic-idea animate__animated animate__fadeInDown">'+ $(this).val() + '</section><div class="drag-area"></div>');


                    /*
                    $('tbody tr td section').draggable({
                        revert: "invalid",
                        zIndex: 100,
                        start: function(event, ui) {
                            var foo = $(ui.helper).parent(); // should return td
                            colIndex = foo.index();
                            $(ui.helper).css({
                                border: "1px solid #ddd",
                            });
                            $('.drag-area').css({
                                padding: '3px',
                                backgroundColor: '#f2f2f2'
                            })
                            console.log(foo);
                        }
                    });

                    $('tbody tr td .drag-area').droppable();
                    */

                }

            });






        }
    });










});