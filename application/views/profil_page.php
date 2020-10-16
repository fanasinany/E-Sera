<div class="text-center">
  <img src="<?= base_url('assets/img/default_profil.png') ?>" class="rounded" alt="Profile Picture default"
  style="width: 200px; height: 200px;">
</div>

<h3>Profile<span class="badge badge-pill badge-success ml-5">Actif</span></h3>
<div class="card">
    <div class="card-header">
        <button id="btngenerale" class="btn btn-outline-info active">Générale</button>
        <button id="btnsecurite" class="btn btn-outline-info ml-3">Sécurité</button>
        <button id="modifprofil" class="btn btn-link"> 
          <i class="fas fa-edit ml-lg-5"></i>
        </button>
        <button id="confirmodif" class="btn btn-link"> 
          <i class="fas fa-check"></i>
        </button>
        <span id="modifok" class="badge badge-pill badge-success ml-5"></span>
        <span id="modifnok" class="badge badge-pill badge-danger ml-5"></span>
    </div>
    <div class="card-body">
    <form id="formgenerale">
      <div class="form-row">
      <input type="text" disabled  hidden value="<?= htmlentities($id_util) ?>" class="form-control" id="id">
        <div class="form-group col-md-5">
          <h6>Nom</h6>
          <input type="text" disabled value="<?= $nom_util ?>" class="form-control" id="nom">
        </div>
        <div class="form-group col-md-5">
          <h6>Prenom</h6>
          <input type="text" disabled value="<?= $prenom_util ?>" class="form-control" id="prenom">
        </div>
        <div class="form-group col-md-2">
          <h6>Genre</h6>
          <select id="genre"  disabled class="form-control">
            <option <?= ($genre_util == "") ? "selected" : "" ?> value = "">Choose...</option>
            <option <?= ($genre_util == "H") ? "selected" : "" ?> value="H">Homme</option>
            <option <?= ($genre_util == "F") ? "selected" : "" ?> value="F">Femme</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-2">
          <h6>Age</h6>
          <input type="number" disabled value="<?= $age_util ?>" class="form-control" id="age">
        </div>
        <div class="form-group col-md-6">
          <h6>Emploi</h6>
          <input type="text"  disabled value="<?= $emploi_util ?>" class="form-control" id="emploi">
        </div>
        <div class="form-group col-md-4">
          <h6>Situation</h6>
          <select id="situation" disabled class="form-control">
            <option <?= ($situation_util == "") ? "selected" : "" ?> value = "">Choose...</option>
            <option <?= ($situation_util == "C") ? "selected" : "" ?> value="C">Celibataire</option>
            <option <?= ($situation_util == "E") ? "selected" : "" ?> value="E">En couple</option>
          </select>
        </div>
      </div>
    </form>

    <form id="formsecurite">
      <h6 class="text-center">En cours de maintenance ... </h6>
    </form>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#formsecurite").hide();
    $("#confirmodif").hide();

    $(document).on("click","#modifprofil", function(){
      $("#modifprofil").hide();
      $("#confirmodif").show();
      $("#nom").removeAttr('disabled');
      $("#prenom").removeAttr('disabled');
      $("#age").removeAttr('disabled');
      $("#emploi").removeAttr('disabled');
      $("#genre").removeAttr('disabled');
      $("#situation").removeAttr('disabled');
    })

    $(document).on("click","#confirmodif", function(){
      $.ajax({
        type:'POST',
        url: site_url + 'index.php/Profil/edit',
        data:{
          id: $("#id").val(),
          nom: $("#nom").val(),
          prenom: $("#prenom").val(),
          age: $("#age").val(),
          emploi: $("#emploi").val(),
          genre: $("#genre").val(),
          situation: $("#situation").val()
        },
        success: function(){
          $("#modifprofil").show();
          $("#modifok").html('Modification reussi');
          $("#confirmodif").hide();

          $("#nom").attr('disabled', true);
          $("#prenom").attr('disabled', true);
          $("#age").attr('disabled', true);
          $("#emploi").attr('disabled', true);
          $("#genre").attr('disabled', true);
          $("#situation").attr('disabled', true);
          setTimeout(function(){
            $("#modifok").html('');
            
          },1500)
        },
        error: function(data){
          if(data.status = 404){
            $("#modifnok").html('Champs requis');
            setTimeout(function(){
              $("#modifnok").html('');
              
            },1500)
          }
        }
      })
    })

    $(document).on("click","#btnsecurite", function () {
        $("#formgenerale").hide();
        $("#formsecurite").show();
        $("#btngenerale").removeClass('active');
        $("#btnsecurite").addClass('active');
      })

      $(document).on("click","#btngenerale", function () {
        $("#formgenerale").show();
        $("#formsecurite").hide();
        $("#btngenerale").addClass('active');
        $("#btnsecurite").removeClass('active');
      })
  })

</script>