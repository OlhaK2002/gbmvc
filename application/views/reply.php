<span style = "font-style: italic"><?php echo $author ?></span>&nbsp<span style="font-style: italic; color: lightseagreen">(<?php echo $data ?>)</span></br>&nbsp &nbsp <?php echo $text?>
<?php  if($_SESSION["login"]!="") {

            echo
            '<div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading'.$id.' ?>">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="false" data-target="#collapse_'.$id.'" aria-controls="collapse_'.$id.'">
                            Ответить
                        </button>
                    </h2>
                </div>
                <div id="collapse_'.$id.'" class="collapse" aria-labelledby="heading'.$id.'" data-parent="#accordionExample">
                    <div class="card-body">
                        <textarea required name="text" id="text_id'.$id.'" class="form-control"></textarea></br>
                        <input type="hidden" id="parent_id'.$id.'" class="parent_id" name="parent_id" value="'.$id.'">
                        <input type="hidden" id="nesting'.$id.'" class="nesting" name="nesting" value="'.$nesting.'">
                        <button id="'.$id.'" type="submit" class="btn">Отправить</button>
        
                    </div>
                </div>
        </div>
        <ul><li><div id="comment'.$id.'"></div></li></ul>';

}
