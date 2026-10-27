<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Add Record</h1>
    <form id="form">
        <input type="text" id="editID" name="editID">
        <br>
        <label for="firstname">Firstname</label>
        <br>
        <input type="text" name="firstname" id="firstname">
        <br id="firstnameBR" hidden>
        <label id="firstnameErrorMSG" style="color: red;" hidden>Firstname is required</label>
        <br><br>
        <label for="middlename">Middlename</label>
        <br>
        <input type="text" name="middlename" id="middlename">
        <br id="middlenameBR" hidden>
        <label id="middlenameErrorMSG" style="color: red;" hidden>Middlename is required</label>
        <br><br>
        <label for="lastname">Lastname</label>
        <br>
        <input type="text" name="lastname" id="lastname">
        <br id="lastnameBR" hidden>
        <label id="lastnameErrorMSG" style="color: red;" hidden>Lastname is required</label>
        <br><br>
        <label for="email">Email</label>
        <br>
        <input type="text" name="email" id="email">
        <br id="emailBR" hidden>
        <label id="emailErrorMSG" style="color: red;" hidden>Email is required</label>
        <br><br>
        <label for="age">Age</label>
        <br>
        <input type="number" name="age" id="age">
        <br id="ageBR" hidden>
        <label id="ageErrorMSG" style="color: red;" hidden>Age is required</label>
        <br><br>
        <label for="birthdate">Birthdate</label>
        <br>
        <input type="date" name="birthdate" id="birthdate">
        <br id="birthdateBR" hidden>
        <label id="birthdateErrorMSG" style="color: red;" hidden>Birthdate is required</label>
        <br><br>
        <button type="submit">Update</button>
    
    </form>

    <!-- <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tableBody">

        </tbody>
    </table> -->

    <script>
        document.addEventListener("DOMContentLoaded", function(){
            let idURL = new URLSearchParams(window.location.search);
            let id = idURL.get("id");

            let firstname =  document.getElementById("firstname");
            let middlename = document.getElementById("middlename");
            let lastname = document.getElementById("lastname");
            let email = document.getElementById("email");
            let age = document.getElementById("age");
            let birthdate = document.getElementById("birthdate");

            document.getElementById("editID").value = id;
            fetch("select_record.php?id=" + encodeURIComponent(id))
            .then(response => response.json())
            .then(data =>{
                if(data.success){
                    firstname.value = data.firstname;
                    middlename.value = data.middlename;
                    lastname.value = data.lastname;
                    email.value = data.email;
                    age.value = data.age;
                    birthdate.value = data.birthdate;

                }
            });
            

        });
        


        document.getElementById("form").addEventListener("submit", function(event){
            event.preventDefault();

            let fname = document.getElementById("firstname");
            let middlename  = document.getElementById("middlename");
            let lname = document.getElementById("lastname");
            let email = document.getElementById("email");
            let age = document.getElementById("age");
            let birthdate = document.getElementById("birthdate");

            const tableBody = document.getElementById("tableBody");

            if(fname.value === ""){
                document.getElementById("firstnameBR").hidden = false;
                document.getElementById("firstnameErrorMSG").hidden = false;
            }else{
                document.getElementById("firstnameBR").hidden = true;
                document.getElementById("firstnameErrorMSG").hidden = true;
            }
            if(middlename.value === ""){
                document.getElementById("middlenameBR").hidden = false;
                document.getElementById("middlenameErrorMSG").hidden = false;
            }else{
                document.getElementById("middlenameBR").hidden = true;
                document.getElementById("middlenameErrorMSG").hidden = true;
            }
            if(lname.value === ""){
                document.getElementById("lastnameBR").hidden = false;
                document.getElementById("lastnameErrorMSG").hidden = false;
            }else{
                document.getElementById("lastnameBR").hidden = true;
                document.getElementById("lastnameErrorMSG").hidden = true;
            }
            if(email.value === ""){
                document.getElementById("emailBR").hidden = false;
                document.getElementById("emailErrorMSG").hidden = false;
            }else{
                document.getElementById("emailBR").hidden = true;
                document.getElementById("emailErrorMSG").hidden = true;
            }
            if(age.value === ""){
                document.getElementById("ageBR").hidden = false;
                document.getElementById("ageErrorMSG").hidden = false;
            }else{
                document.getElementById("ageBR").hidden = true;
                document.getElementById("ageErrorMSG").hidden = true;
            }
            if(birthdate.value === ""){
                document.getElementById("birthdateBR").hidden = false;
                document.getElementById("birthdateErrorMSG").hidden = false;
            }else{
                document.getElementById("birthdateBR").hidden = true;
                document.getElementById("birthdateErrorMSG").hidden = true;
            }

            if(fname.value !== "" && middlename.value !== "" && lname.value !== "" && email.value !== "" && age.value !== "" && birthdate.value !== ""){
                let formData = new FormData(event.target);

                fetch("update.php", {
                    method : 'POST',
                    body: formData
                }).then(response => response.json())
                .then(data =>{
                    if(data.success){
                        alert("updated");
                        window.location.href = "index.php"
                    }
                });

                
            }



        });
    </script>


</body>
</html>