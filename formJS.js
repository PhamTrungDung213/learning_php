let funcfe=()=>{
    document.getElementById("myForm").addEventListener("submit",function(event){
        event.preventDefault();
        let name=document.getElementById("name").value;
        let email=document.getElementById("email").value;
        let city=document.getElementById("city").value;
        let note=document.getElementById("ta").value;
        if(name.trim()===""||email.trim()===""||city.trim()===""){
            alert("Please enter all your information!");
        }else{
            console.log("Tên:", name);
            console.log("Email:", email); 
            console.log("Thành phố:", city);
            console.log("Note:",note);
        }
    })
}
funcfe()