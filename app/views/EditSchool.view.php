<?php require 'partials/header.view.php'; ?>
<div class="p-8">
    <?php
        $last = count($schools) - 1;
        $highestID = $schools[$last]->schoolID;
    ?>
    <?php if ($schoolID > $highestID): ?>
        <div class="schoolContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
            <div class="p-8">
                <form action="/EditSchool" method="GET">
                    <h1 class="text-2xl font-bold">Looks like something wen wrong :/</h3>
                </form>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($schools as $school): ?>
            <?php if ($school->schoolID == $schoolID):?>
                <div class="schoolContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
                    <div class="p-8">
                        <form action="/SaveSchool" method="POST">
                            <input name="id" style="display:none;" value="<?=$school->schoolID?>">
                            <input style="border:black 1px solid;" type="text" name="schoolName" value="<?=$school->schoolName?>">
                            <?php 
                                $JSONDetail = json_decode($school->details);
                                foreach ($JSONDetail as $name => $detail):
                            ?>
                            <p class="MarT-10"> 
                            <input name="key[]" value="<?=$name?>" class="name" readonly> :
                            <input style="border:black 1px solid;" type="text" name="value[]" value="<?=$detail?>"></p>
                            <?php endforeach ?>
                            <div class="alignRight">
                                <button class="bg-green-400 hover:bg-green-500 text-white font-bold py-2 px-4 border border-blue-700 rounded">Submit changes!</button>
                            </div>
                        </form>
                    </div>	
                </div>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>
</div>
<?php require 'partials/footer.view.php'; ?>