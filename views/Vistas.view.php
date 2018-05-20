<?php require 'headermin.view.php'; ?>
<div class="main">
    <div class="vistas">
       <?php foreach($posts as $post): ?> 
            <div class="foto">
                <div class="arriba">
                <h3 class ="titulo"><?php echo $post[1];?></h3>
                    <h4 class = "fecha"><?php echo $post[3];?></h4>
                    <p class ="autor">
                    <?php
                        $conexion = conexion($bd_config);
                        $sentencia = $conexion->prepare("SELECT Nombres, Apellidos FROM userssis WHERE id = $post[6]");
                        $sentencia->execute();
                        $Variables = $sentencia->fetchAll();
                        echo $Variables[0][0] . ' '. $Variables[0][1];
                    ?></p>
                </div>
                
                <img src ="imagenes/<?php echo $post[5];?>" alt="">
                
                <div class="abajo">
                    
                    <p class="descripcion"><?php echo $post['texto'];?></p>
                    
                    <?php if ($_SESSION['id']==$post[6]): ?> 
                    <form action="delPub.php" method="post">
                        <input name="id" type="hidden" value="<?php echo $post[0]?>">
                        <input type="submit" class= "btn btn-default"value="Eliminar">
                    </form>
                    <form action="editarPub.php" method="post">
                        <input name="id" type="hidden" value="<?php echo $post[0]?>">
                        <input type="submit" class = "btn btn-default" value="Modificar">
                    </form>
                    <?php endif;?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php require 'footer.php' ?>