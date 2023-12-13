
<?php

include 'article.php';

$articleManager = new Articlee();

if(isset($_POST['test'])){
                $articles = $articleManager->getArticles();
                foreach ($articles as $article) {
                ?>
                <tr>
                    <td><?php echo $article['Id']; ?></td>
                    <td><?php echo $article['titre']; ?></td>
                    <td><?php echo $article['contenu']; ?></td>
                    <td>
                     
                           
                    <button type="button" onclick="deleteArticle(<?php echo $article['Id']; ?>)" class="btn btn-danger">Supprimer</button>
                     

                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updateModal<?php echo $article['Id']; ?>">
                            Modifier
                        </button>

                        <div class="modal fade" id="updateModal<?php echo $article['Id']; ?>" tabindex="-1"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Modifier l'article</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="update.php" class="formupdate" method="post">
                                            <input type="hidden" name="article_id"
                                                value="<?php echo $article['Id']; ?>">
                                            <div class="mb-3">
                                                <label for="nouveau_titre" class="form-label">Nouveau titre:</label>
                                                <input type="text" name="nouveau_titre" class="form-control"
                                                    value="<?php echo $article['titre']; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="nouveau_contenu" class="form-label">Nouveau contenu:</label>
                                                <textarea name="nouveau_contenu"
                                                    class="form-control"><?php echo $article['contenu']; ?></textarea>
                                            </div>
                                            <button type="submit"  class="btn btn-primary">Enregistrer les
                                                modifications</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php }} ?>


               