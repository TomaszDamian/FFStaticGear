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
                        <h1 class="text-2xl font-bold" style="text-align: center">
                        <?=$Character->CharacterName, " :"?>
                        </h1>
                        <!-- character current gear displayed-->
                        <div class="GearContainer">
                            <div>
                                <p class="text-sm">current gear:</p>
                                <?php 
                                    foreach ($currentGear as $cgear):
                                        $counter = 0;
                                        if ($cgear->ownerID == $Character->ID):
                                            $GearDetail = json_decode($cgear->gear);
                                            foreach ($GearDetail as $piece => $source):
                                                echo 
                                                "<div class='ItemContainer'>
                                                    <img class='ItemIcon' src='../resources/images/ItemIcons/$piece.png'></img>
                                                    <p class='ml-2 mr-2'> - </p>
                                                    <div>
                                                        <select class='dropdownBox'>
                                                            <option>$source</option>
                                                            <option>dungeon</option>
                                                            <option>extreme</option>
                                                            <option>tombstone</option>
                                                            <option>savage</option>
                                                            <option>crafted</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                ";
                                            endforeach;
                                        endif;
                                    endforeach;
                                ?>
                            </div>
                            <div>
                                <?php 
                                    foreach ($neededGear as $ngear):
                                        $counter = 0;
                                        if ($ngear->ownerID == $Character->ID):
                                            $GearDetail = json_decode($ngear->gear);
                                            foreach ($GearDetail as $piece => $source):
                                                echo 
                                                "<div class='ItemContainer'>
                                                    <div>
                                                        <select class='dropdownBox'>
                                                            <option>$source</option>
                                                            <option>dungeon</option>
                                                            <option>extreme</option>
                                                            <option>tombstone</option>
                                                            <option>savage</option>
                                                            <option>crafted</option>
                                                        </select>
                                                    </div>
                                                    <p class='ml-2 mr-2'> - </p>
                                                    <img class='ItemIcon' src='../resources/images/ItemIcons/$piece.png'></img>  
                                                </div>
                                                ";
                                            endforeach;
                                        endif;
                                    endforeach;
                                ?>
                            </div>
                        </div>
                        <div style="display:flex; justify-content:center;">
						    <button class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 border-blue-700 rounded"> Edit my Gear </button>
					    </div>
                    </div> 
                </div>
            </div>
        </div>
            
    <?php endif; ?>
<?php 
$counter++;
endforeach; ?>
<?php require 'partials/footer.view.php'; ?> 