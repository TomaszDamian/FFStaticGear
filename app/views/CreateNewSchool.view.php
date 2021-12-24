<?php require 'partials/header.view.php'; ?>
<div class="p-8">
    <div class="schoolContainer w-2/3 mt-6 rounded overflow-hidden shadow-lg WhiteBackGround">
        <div class="p-8">
            <form action="/SubmitSchool" method="POST" >
                <div id="rows">
                    <input style="border:black 1px solid;" type="text" name="schoolName" value="School Name">
                    <p class="MarT-10"> 
                        <input name="key[]" value="Address" class="name" readonly> :
                        <input style="border:black 1px solid;" type="text" name="value[]" value="">
                    </p>
                    <p class="MarT-10">
                        <input name="key[]" value="post code" class="name" readonly> :
                        <input style="border:black 1px solid;" type="text" name="value[]" value="">
                    </p>
                    <p class="MarT-10">
                        <input name="key[]" value="city/town" class="name" readonly> :
                        <input style="border:black 1px solid;" type="text" name="value[]" value="">
                    </p>
                    <p class="MarT-10">
                        <input name="key[]" value="phoneNumber" class="name" readonly> :
                        <input style="border:black 1px solid;" type="text" name="value[]" value="">
                    </p>
                    <p class="MarT-10">
                        <input name="key[]" value="email" class="name" readonly> :
                        <input style="border:black 1px solid;" type="text" name="value[]" value="">
                    </p>
                </div>
                <button onclick="AddRow()" type="button">
                Add another row
                </button>
                <div class="alignRight">
                    <button class="bg-green-400 hover:bg-green-500 text-white font-bold py-2 px-4 border border-blue-700 rounded">Create a new school!</button>
                </div>
            </form>
        </div>	
    </div>
</div>
<script>
    function AddRow(){
        //I want to create one input for the key input box to appear
        let NewKeyInput = document.createElement("input");
        NewKeyInput.setAttribute("name", "key[]");
        NewKeyInput.className = "blackBorder";

        let NewValueInput = document.createElement("input");
        NewValueInput.setAttribute("name", "value[]");
        NewValueInput.className = "blackBorder";

        //create the container around the inputs
        let pContainer = document.createElement("p");
        pContainer.className = "MarT-10";

        //appends the key input
        pContainer.appendChild(NewKeyInput);
        //creates the text and appends it into the p tag
        let node = document.createTextNode(" : ");
        //append both the text and value input
        pContainer.appendChild(node);
        pContainer.appendChild(NewValueInput);

        //append it into the site
        document.getElementById("rows").appendChild(pContainer);

    }
</script>
<?php require 'partials/footer.view.php'; ?>