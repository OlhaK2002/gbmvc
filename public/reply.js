        $(document).on('click', 'button.btn', function () {
            var id = $(this).attr('id');
            var text = $("#text_id" + id).val();
            var parent_id = $("#parent_id" + id).val();
            var nesting = $("#nesting" + id).val();
            console.log(id, text, parent_id, nesting);
            $.ajax({
                url: '/comment/comments',
                type: 'POST',
                dataType: 'html',
                //data: $("#form").serialize(),
                data: {text: text, parent_id: parent_id, nesting: nesting},
                success: function (result) {
                    console.log(result);
                    $("#comment"+id).append(result);
                    $('textarea.form-control').val('');
                }

            })

        })






