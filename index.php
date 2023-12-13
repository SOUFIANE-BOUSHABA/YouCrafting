<?php
session_start();
if(!isset($_SESSION['idUser'])){
    header("location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouCrafting</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include 'article.php';

    $articleManager = new Articlee();

    if ( $_SESSION['role']==1) {
       
    
    ?>

    <div class="container mt-5">
        
        <form id="addArticleForm" class="mb-3">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre:</label>
                <input type="text" name="titre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">Contenu:</label>
                <textarea name="contenu" class="form-control" required></textarea>
            </div>
            <button type="button" id="submitBtn" class="btn btn-primary">Ajouter</button>
        </form>

        <h2>Liste des articles</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="demo">

            </tbody>
        </table>
    </div>
     <?php } else{ ?>
       <h1> <?= $_SESSION['name']?> vous pas active for add article</h1>
   <?php  } ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('submitBtn').addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'add.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                     affiche();
                } else {
                    console.error('Request failed with status:', xhr.status);
                }
            };

            xhr.onerror = function() {
                console.error('Request failed');
            };

            var formData = new FormData(document.getElementById('addArticleForm'));
            var serializedData = new URLSearchParams(formData).toString();

            xhr.send(serializedData);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        affiche();
});
function affiche(){
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'affichage.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };

    xhr.send('test=true');}



    
  
    function deleteArticle(id){
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delet.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                affiche();
            }
        };

        xhr.send(`delet=` + encodeURIComponent(id));
    }



// document.querySelectorAll('.formupdate').forEach(function (form) {
// form.addEventListener('submit', function (event) {
//         event.preventDefault(); 
//         // Prevent the default form submission

//         var articleId = form.querySelector('[name="article_id"]').value;
//         var newTitle = form.querySelector('[name="nouveau_titre"]').value;
//         var newContent = form.querySelector('[name="nouveau_contenu"]').value;
//         console.log(newTitle);
//         update(articleId, newTitle, newContent);
//     });
// });
   

// function update(id, newTitle, newContent) {
//     var xhr = new XMLHttpRequest();
//     xhr.open('POST', 'update.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//     xhr.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             affiche();
//         }
//     };

//     var data = 'article_id=' + encodeURIComponent(id) +
//                '&nouveau_titre=' + encodeURIComponent(newTitle) +
//                '&nouveau_contenu=' + encodeURIComponent(newContent);

//     xhr.send(data);
// }

       
    
    </script>


</body>

</html>