<?php require_once '../inc/header.php';

if (!empty($_POST)): 
     //die('coucou') //MODIFICATION:  // 1 - Modification de l'upload AVEC modification de l'image ('picture Edit') mais SANS modification de la vidéo: 

     if (!empty($_FILES['pictureEdit']['name']) && empty($_FILES['video']['name'])):

         $picture_name=date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['pictureEdit']['name'];
         $picture_bdd='upload/picture/'. $picture_name;
         copy($_FILES['pictureEdit']['tmp_name'], '../'.$picture_bdd); 
         unlink('../'.$_POST['picture']);
     endif;

     // 2 - Modification de l'upload SANS modification de l'image mais AVEC modification de la vidéo ('video Edit'): 

     if (!empty($_FILES['videoEdit']['name']) && empty($_FILES['picture']['name'])):

         $video_name=date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['videoEdit']['name'];
     $video_bdd='upload/video/'. $video_name;
         copy($_FILES['videoEdit']['tmp_name'], '../'.$video_bdd); 
         unlink('../'.$_POST['video']);
     endif;

     // 3 - Modification de l'upload AVEC modification de l'image ('picture Edit')  et AVEC modification de la vidéo ('video Edit'): 

     if (!empty($_FILES['videoEdit']['name']) && !empty($_FILES['pictureEdit']['name'])):
         $picture_name=date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['pictureEdit']['name'];
         $video_name=date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['videoEdit']['name'];
         $picture_bdd='upload/picture/'. $picture_name;
         $video_bdd='upload/video/'. $video_name;
         copy($_FILES['pictureEdit']['tmp_name'], '../'.$picture_bdd); 
         copy($_FILES['videoEdit']['tmp_name'], '../'.$video_bdd); 
         unlink('../'.$_POST['picture']);
         unlink('../'.$_POST['video']);
     endif;

     // 4 - Modification de l'upload SANS modification de l'image et SANS modification de la vidéo: 

     if (empty($_FILES['pictureEdit']['name']) && empty($_FILES['picture']['name']) && empty($_FILES['videoEdit']['name']) && empty($_FILES['video']['name'])):
         $picture_bdd=$_POST['picture'];
         $video_bdd=$_POST['video'];
     endif;
    
    //Gestion fichiers photo lors de l'insert d'une nouvelle photo: 
    if (!empty($_FILES['picture']['name'])): 
        $picture_name=date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['picture']['name'];
        $picture_bdd='Upload/picture/'. $picture_name;
    // die(var_dump($picture_bdd));
        copy($_FILES['picture']['tmp_name'], '../'.$picture_bdd); 
    endif;

    debug(var_dump($_FILES));
    die();
    //Gestion fichiers video lors de l'insert d'une nouvelle video: 
    if (!empty($_FILES['video']['name'])): 
        $video_name=date_format(new DateTime(), 'dmYHis') . uniqid() . $_FILES['video']['name'];
        $video_bdd='Upload/video/'. $video_name;
        die(var_dump($video_bdd));
        copy($_FILES['video']['tmp_name'], '../'.$video_bdd); 
    endif;


    //INSERT: 

    $requete=executeRequete("REPLACE INTO upload VALUES(:id, :name, :description, :picture, :video)", array(
        ':id'=>$_POST['id'],
        ':name'=>$_POST['name'],
        ':description'=>$_POST['description'],
        ':picture'=>$picture_bdd,
        ':video'=>$video_bdd,
    ));

    if(isset($_FILES['pictureEdit']) || isset($_FILES['videoEdit'])):
    $_SESSION['messages']['success'][]='Votre produit a bien été modifié'; 
    else:
    $_SESSION['messages']['success'][]='Votre produit a bien été ajouté'; 
    endif; 
    header('location:../index.php');
    exit();

endif;

if(isset($_GET['id'])):
    $resultat=executeRequete("SELECT * FROM upload WHERE id= :id", array(':id'=>$_GET['id'] )); 
    $upload=$resultat->fetch(PDO::FETCH_ASSOC);
endif;

?>



<form action="" method="post" enctype="multipart/form-data">  
    <br> 
    <h1>Upload / Modify videos: </h1>
    <fieldset>
       
        <!-- id -->
       <input type="hidden" name="id" value="<?= $upload['id'] ?? 0 ; ?>">

       <!-- nom -->
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Title</label>
            <input type="text" name="name" value="<?= $upload['name'] ?? "" ; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le nom du film">
        </div>
        
        <!-- description -->
        <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Resume</label>
            <textarea name="description" class="form-control" id="exampleTextarea" rows="3"><?= $upload['description'] ?? "" ; ?></textarea>
        </div>

        <!-- image + video -->
        <?php if(isset($upload)): ?>

            <!-- photo -->
            <div class="form-group">
            <label for="formFile" class="form-label mt-4">Film poster</label>
            <input name="pictureEdit" class="form-control" type="file" id="formFile">
            </div>
            <input type="hidden" name="picture" value="<?=  $upload['picture'] ; ?>">
            <div >
                <img width="200" src="<?= '../' . $upload['picture']; ?>" alt="">
            </div>

            <!-- video -->
            <div class="form-group">
            <label for="formFile" class="form-label mt-4">Video file</label>
            <input name="videoEdit" class="form-control" type="file" id="formFile">
            </div>
            <input type="hidden" name="video" value="<?=  $upload['video'] ; ?>">
            <div >
                <video src="<?= '../' . $upload['video']; ?>"></video>
            </div>

        <?php else: ?>
            <!-- photo -->
            <div class="form-group">
            <label for="formFile1" class="form-label mt-4">Film poster</label>
            <input name="picture" class="form-control" type="file" id="formFile1" >
            </div>

            <!-- video -->
            <div class="form-group">
            <label for="formFile" class="form-label mt-4">Video file</label>
            <input name="video" class="form-control" type="file" id="formFile" >
            </div>
        <?php endif; ?>

        <!-- highlight 
        <div class="form-group">
            <label for="exampleTextarea" class="form-label mt-4">Highlight 
            </label>
            <input type="checkbox" name="highlight" value="1" class="" >
        </div> -->


        <button type="submit" class="btn btn-primary">Upload / Modify</button>
    </fieldset>
</form>


<?php require_once '../inc/footer.php'; ?>