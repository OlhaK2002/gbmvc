
<span style = "font-style: italic"><?php echo $author ?></span>&nbsp<span style="font-style: italic; color: lightseagreen">(<?php echo $data?>)</span></br><?php echo $text?><div class="accordion" id="accordionExample">
<div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading<?php echo $this->array1['id']?>">
                    <h2 class="mb-0">
                     <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="false" data-target="#collapse_<?php echo $id ?>" aria-controls="collapse_<?php echo $id ?>">
                      Ответить
                    </button>
                    </h2>
                </div>
                <div id="collapse_<?php echo $id?>" class="collapse" aria-labelledby="heading <?php echo $id?>" data-parent="#accordionExample">
                    <div class="card-body">
                          <textarea required name="text" id="text_id<?php echo $id?>" class="form-control"></textarea></br>
                          <input type="hidden" id="parent_id<?php echo $id?>" class="parent_id" name="parent_id" value="<?php echo $id?>">
                          <button id="<?php echo $id?>" type="submit" class="btn btn-light">Отправить</button>

                    </div>
                </div>
</div><ul><li><div id="comment<?php echo $id ?> "></div></li></ul>