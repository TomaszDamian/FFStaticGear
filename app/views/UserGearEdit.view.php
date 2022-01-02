<?php require 'partials/header.view.php'; ?>

<?php 
    $counter = 0;
    foreach($Characters as $Character): ?>
    <?php if($Character->ID == $_GET['CharID']): ?> 
        <div class="p-8 ContentHolder">
            <div class="UserContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
                <div class="p-8">
                    <div class="JobIcon">
                        <?php foreach($CharacterClassName as $ClassName): ?>
                            <div>
                                <?="<img class='ml-6 Cimage' src='../resources/images/JobIcons/",$ClassName->ClassName,".png'> </img>"; ?>
                                <input class="ml-6 mt-1 Cimage" type="checkbox"
                                    <?php 
                                        foreach($_GET['ClassIDs'] as $ClassID):
                                            if($ClassID == $ClassName->ClassID):
                                                echo "checked";
                                            endif;
                                        endforeach;
                                    ?>
                                >
                            </div>
                        <?php endforeach; ?>
                    </div>
                                        

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php 
$counter++;
endforeach; ?>
<?php require 'partials/footer.view.php'; ?> 