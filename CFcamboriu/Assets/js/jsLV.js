$(document).ready(function() {
    home()
    hover();
    boxSetores();
    setor();
    Login();
    getItenName();
    
})
function Login() {
    $("#Plogin").click(function() {
        $("#loginCadastro").css("display", "block");
        $("#boxMedicamentos").css("display", "none");
        $("#boxSaude").css("display", "none");
        $("#boxBeleza").css("display", "none");

    });
    $("#closePag").click(function() {
        $("#loginCadastro").css("display", "none");
    });
}

// funcao para redirecionamento de filtor de produtos retornando a url
function boxSetores() {
    $("#boxMedicamentos p").click(function() {
        var genero = $(this).text();
        var url = "medicamentos/" + genero;
        retiraAcentoDaUrl(url);
    })
    $("#boxSaude p").click(function() {
        var genero = $(this).text();
        var url = "saude/" + genero;
        retiraAcentoDaUrl(url);
    })
    $("#boxBeleza p").click(function() {
        var genero = $(this).text();
        var url = "beleza/" + genero;
        retiraAcentoDaUrl(url);
    })
}

// funcaopara retirar acentos das strings que seram passadas para a url
function retiraAcentoDaUrl(url) {
    // caracteres especiais para retirar e retonar uma string pura para a url
    strSChar = "áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ ";
    strNoSChars = "aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC ";
    
    var newUrl = "";
    for (var i = 0; i < url.length; i++) {
        if (strSChar.indexOf(url.charAt(i)) != -1) {
            newUrl += strNoSChars.substr(strSChar.search(url.substr(i, 1)), 1);
        } else {
            newUrl += url.substr(i, 1);
        }
    }
    newUrl.replace(/[^a-zA-Z 0-9]/g, '').toUpperCase();
    window.location.href = 'http://localhost:8080/'+ newUrl;
}


function hover() {
    $("#medic").hover(function() {
        $("#boxMedicamentos").css("display", "block");
        $("#boxSaude").css("display", "none");
        $("#boxBeleza").css("display", "none");
    });
    $("#saude").hover(function() {
        $("#boxMedicamentos").css("display", "none");
        $("#boxSaude").css("display", "block");
        $("#boxBeleza").css("display", "none");
    })
    $("#beleza").hover(function() {
        $("#boxMedicamentos").css("display", "none");
        $("#boxSaude").css("display", "none");
        $("#boxBeleza").css("display", "block");
    })
    $(".main").mouseover(function() {
        $("#boxMedicamentos").css("display", "none");
        $("#boxSaude").css("display", "none");
        $("#boxBeleza").css("display", "none");
    });
}

// funcao para direcionar para home quando clicar no icone do site
function home() {
    $(".logo").click(function() {
        window.location.href = "http://localhost:8080";
    })
}

// funcao para selecionar todos os produtos do setor selecionado
function setor() {
    $("#tituloMedic").click(function() {
        window.location.href = 'http://localhost:8080/Medicamentos';
    })
    $("#medic").click(function() {
        window.location.href = 'http://localhost:8080/Medicamentos';
    })
    $(".imgSau").click(function() {
        window.location.href = 'http://localhost:8080/Saude';
    })
    $("#saude").click(function() {
        window.location.href = 'http://localhost:8080/Saude';
    })
    $(".imgBel").click(function() {
        window.location.href = 'http://localhost:8080/Beleza';
    })
    $("#beleza").click(function() {
        window.location.href = 'http://localhost:8080/Beleza';
    })
}

// metodo para pegar o nome do produto clicado para adcionar ao carrinho
function getItenName() {
    $(".prod").click(function() {
        var nome = $(this).parent().text();
        var tra = nome.split("\n");
        tra.splice(0,3);
        
        // $("#nomeProd").text(tra[0]);
        $("#info h2").text("t");
    }) 
}

// function TrocaImgHead() {
//     var time = new Date();
//     var segundos = time.getSeconds();
    
//     $("#opcao1").click(function() {
//         $("#imgHead").attr("src", "/Assets/css/EstiloLv/img/cover.jpg");
//     });

//     $("#opcao2").click(function() {
//         $("#imgHead").attr("src", "/Assets/css/EstiloLv/img/promocaocarinho.png");
//     });

//     if(segundos <= 30 && segundos > 0) {
//         $("#imgHead").attr("src", "/Assets/css/EstiloLv/img/cover.jpg");
//     }else if(segundos <= 60 && segundos > 30) {
//         $("#imgHead").attr("src", "/Assets/css/EstiloLv/img/promocaocarinho.png");
//     }
// }
