function delData(id){
    if(confirm("confirma a exclusao do registro?")){
        var params = {id: id};
        deleteItem(`${BASEURL}/disciplinas/del`, params).then(res =>{
            alert(res.data.texto);
            if(res.data.codigo == "1"){
                getDados();
            }
        });
    }
}

function loadData(id){
    getUrl(`${BASEURL}/disciplinas/loadData/${id}`).then(res =>{
        if (res.data.length>0){
            var txtcod = document.querySelector("#txtcoddisc");
            var txtnome = document.querySelector("#txtnomedisc");
            var txtch = document.querySelector("#txtch");

                txtcod.value = res.data[0].codigo;
                txtcod.dispatchEvent(new Event ('change'));
            
                txtnome.value = res.data[0].nome;
                txtnome.dispatchEvent(new Event ('change'));

                txtch.value = res.data[0].carga;
                txtch.dispatchEvent(new Event ('change'));
                
                activeLabel(document.querySelector("label for = 'txtch' "));
                activeLabel(document.querySelector("label for = 'txtnomedisc' "));

                showEdit();

        }
    });
}

function getDados(){
    axios.post(BASEURL + "/disciplinas/listaDisc").then(res =>{
        var txt = "";
        for (var i =0; i < res.data.length; i++){
            var reg = res.data[i];
            var bEdit = `<a href= 'javascript:void(0)' onclick ='loadData (${reg.codigo});'> <i class="fas fa-edit"></i> </a>`;
            var bDel  = `<a href= 'javascript:void(0)' onclick ='delData (${reg.codigo});'> <i class="fas fa-trash-alt"></i> </a> `;
            txt += `<tr><td>${reg.nome}</td> <td>${reg.carga}</td> <td>${bEdit} ${bDel}</td></tr>`;
        }
        console.log(txt)
    
        document.querySelector("#lsdisc").innerHTML = txt;
    });
}

getDados();

function reset(){
    document.querySelector("#frmCadDisc").reset();
    hideEdit();
}

document.querySelector("#btnInc").addEventListener("click", function () {
    try {
        var elemento = document.getElementById("txtnomedisc");
        var nome = elemento.value;
        var elemento2 = document.getElementById("txtch");
        var ch = elemento2.value
        axios.post(BASEURL + "/disciplinas/addDisc",{'nome': nome, 'ch': ch}).then(res =>{
            if (res.data) {
                alert(res.data.texto);
                if (res.data === 1) {
                    reset();
                    getDados();
                }
            } else {
                alert("Erro na resposta do servidor");
            }
        });
    } catch (error) {
        console.error("Erro:", error);
        alert("Erro ao processar a solicitação. Consulte o console para obter mais detalhes.");
    }
});


document.querySelector("#btnSave").addEventListener("click", function(){
    let form = document.querySelector("#frmCadDisc");
    postForm(`${BASEURL}/disciplinas/save`, form).then(res =>{
        alert(res.data.texto);
        if (res.data.codigo == "1"){
            reset();
            getDados();
        }
    });
});

document.querySelector("#btnCancel").addEventListener("click", function(){
    reset();
});


document.querySelector("DOMContentLoaded", () =>{
});