
</div>
<br><br>
<script src="<?php echo DIRBSJS.'jquery-slim.min.js';?>"></script>
<script src="<?php echo DIRJS.'jquery.js';?>"></script>
<script src="<?php echo DIRBSJS.'popper.min.js' ;?>"></script>
<script src="<?php echo DIRBSJS.'bootstrap.min.js' ;?>"></script>

<script>

  function getId(id){

    $("#delete-aluno").attr('href', "delAluno.php?num="+id)
    // console.log(id);
     
  }
</script>
</body>
</html>