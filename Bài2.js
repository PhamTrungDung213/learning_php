let functt=()=>{//
    document.getElementById("MyForm").addEventListener("submit",function(event){
        event.preventDefault();
        let lb=document.getElementById("tb");
        let $exname=document.getElementById("exname").value;
        let $user=document.getElementById("user").value;
        let email=document.getElementById("email").value;
        let sdt=document.getElementById("sdt").value;
        let pass=document.getElementById("pass").value;
        let note=document.getElementById("note").value;
        if($exname.trim()===""||$user.trim()===""||email.trim()===""||
            sdt.trim()===""||pass.trim()===""){
            lb.innerHTML="Vui lòng nhập đầy đủ thông tin";
            lb.style.color='red';
        }else{
            lb.innerHTML="Thông tin của bạn đã được lưu ! =>(Console log)";
            lb.style.color='chartreuse';
            console.log("Họ và tên: ",$exname+" "+$user);
            console.log("Email: ",email);
            console.log("Số điện thoại: ",sdt);
            console.log("Mật khẩu: ",pass);
            console.log("Ghi chú: ",note);
        }
    })
}
functt()