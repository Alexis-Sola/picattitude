<?php


class ViewAddPic
{
    public function modal_add_pic()
    {
        echo '
        <div class="modal fade" id="modal-add-pic" tabindex="-1" role="dialog" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Importer une image</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>  
              <form method="post" action="../JS/utils/add_pic.php" id="form-pic" enctype="multipart/form-data">
              <div class="modal-body">
                <div id="retour-add-pic"> </div>
                <label> Choisir une image </label>
                    <div class="input-group"> 
                        <div class="custom-file" id="chosefile"> 
                            <label class="custom-file-label" id="change-img-name"> Choisir une image... </label>
                            <input type="file" class="custom-file-input" name="photo" id="file-upload" onchange="showname()" />
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label>Titre de l\'image </label>
                        <input type="text" class="form-control" name="titre" placeholder="Entrer un titre" />
                    </div>
                    <div class="form-group">
                        <label>Description de l\'image</label>
                        <textarea class="form-control" name="img-text" id="img-text" rows="4" placeholder="Entrer une decription"></textarea>
                    </div>    
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-dark btn-lg btn-block" name="action" id="validate">Ajouter</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        ';
    }
}