        $(document).on('click', 'button.btn', function () {
            var id = $(this).attr('id');
            var text = $("#text_id" + id).val();
            var parent_id = $("#parent_id" + id).val();
            $.ajax({
                url: '/comment/comments',
                type: 'POST',
                dataType: 'html',
                //data: $("#form").serialize(),
                data: {text: text, parent_id: parent_id},
                success: function (result) {
                    console.log(result);
                    $("#comment"+id).append(result);
                    $('textarea.form-control').val('');
                }

            })

        })






