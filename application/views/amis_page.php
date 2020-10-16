<?php if(empty($friends)): ?>
<div class="breadcrumb">
    <h6 class="text-center">Aucun amis</h6>
</div>
<?php endif ?>
<?php foreach($friends as $friend): ?>
<div class="breadcrumb">

        <div class="col-md-1">
        <img src="<?= base_url('assets/img/default_profil.png') ?>" class="rounded" alt="Profile Picture default"
        style="width: 40px; height: 40px;">
        </div>
        <div class="col-md-7">
            <h6><?= $friend['nom_util'] ?> <?= $friend['prenom_util'] ?></h6>
            <p style="font-size: 15px; font-family: Berlin sans fb; color:grey"><?= $friend['age_util'] ?> ans, Travaille en tant que <?= $friend['emploi_util'] ?></p>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-info btn-sm">
            Amis <span class="badge badge-light"><i class="fas fa-user-friends"></i></span>
            </button>
            <button type="button" class="btn btn-primary btn-sm">
            Ajouter <span class="badge badge-light"><i class="fas fa-user-plus"></i></span>
            </button>
            <button type="button" class="btn btn-warning btn-sm">
            MP <span class="badge badge-light"><i class="fas fa-comments"></i></span>
            </button>
            <button type="button" class="btn btn-danger btn-sm">
            Rétirer <span class="badge badge-light"><i class="fas fa-user-times"></i></span>
            </button>
        </div>
</div>
<?php endforeach ?>
