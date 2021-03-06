<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include('./head.php') ?>
</head>

<body class="bg-black" id="body">

    <div class="entire-screen">
        <div class="container" style="max-width: 100% !important;">
            <div class="row pt-4 pb-4 bg-black">
                <div class="col text-center">
                    <i class="fa-solid fa-angle-left back-button" onclick="load('ferramentas.php');"></i>
                    <span class="logo-font" style="color: #e30b5c; font-weight: bold; font-size: 100px; line-height: normal;">Workout
                        <i class="fa-solid fa-dumbbell"></i></span>
                </div>
            </div>
        </div>
        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span>Calculadora de IMC</span>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 form-floating">
                    <input type="tel" class="form-control" id="altura" maxlength="3" placeholder="altura" onchange="alertaPreenchimento('#altura', '#label_altura');">
                    <label for="altura" class="custom-label" id="label_altura">Altura (CM)</label>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 form-floating">
                    <input type="tel" class="form-control" id="peso" maxlength="3" placeholder="peso" onchange="alertaPreenchimento('#peso', '#label_peso');">
                    <label for="peso" class="custom-label" id="label_peso">Peso (KG)</label>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-primary" id="calcular">Calcular</button>
                </div>
            </div>
        </div>

        <div class="container mt-5 bg-gray br-20" style="padding: 3%;">
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span class="color-pink">Resultado</span>
                </div>
            </div>
            <div class="row">
                <div class="col color-white text-center fs-large">
                    <span id="imc">?</span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table text-white fs-1 mt-5 d-none" id="tabela_imc">
                        <thead>
                            <tr>
                                <th scope="col" class="fw-bold">&nbsp;</th>
                                <th scope="col" class="fw-bold">IMC</th>
                                <th scope="col" class="fw-bold">PESO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="" id="linha1">
                                <th scope="row">Magreza</th>
                                <td>
                                    < 18.5</td>
                                <td>
                                    < 59.9 Kg</td>
                            </tr>
                            <tr class="" id="linha2">
                                <th scope="row">Normal</th>
                                <td>18.5 a 24.9</td>
                                <td>59.9 a 80.7 Kg</td>
                            </tr>
                            <tr class="" id="linha3">
                                <th scope="row">Sobrepeso</th>
                                <td> 24.9 a 30</td>
                                <td>80.7 a 97.2 Kg</td>
                            </tr>
                            <tr class="" id="linha4">
                                <th scope="row">Obesidade</th>
                                <td>> 30</td>
                                <td>> 97.2 Kg</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="container mt-5 bg-gray fixed-bottom border-light-gray br-tp-20" style="padding: 3%; border-top: 7px solid; border-left: 7px solid; border-right: 7px solid;">
            <div class="row">
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_inicio" onclick="load('home.php')">
                    <i class="fa-solid fa-house color-pink"></i><br>
                    <span class="fs-extra-small">In??cio</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_treino" onclick="load('fichas.php')">
                    <i class="fa-solid fa-dumbbell color-pink"></i><br>
                    <span class="fs-extra-small">Treino</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_metas" onclick="load('minhasMetas.php')">
                    <i class="fa-solid fa-list-check color-pink"></i><br>
                    <span class="fs-extra-small">Metas</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" style="border-right: 3px solid #a59b9c !important;" id="nav_ranking" onclick="load('ranking.php')">
                    <i class="fa-solid fa-ranking-star color-pink"></i><br>
                    <span class="fs-extra-small">Ranking</span>
                </div>
                <div class="col text-white m-0 text-center color-white fs-medium" id="nav_perfil" onclick="load('perfil.php')">
                    <i class="fa-solid fa-circle-user color-pink"></i><br>
                    <span class="fs-extra-small">Perfil</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#altura").mask("000");
            $("#peso").mask("000");
        });

        $("#calcular").click(function() {
            if ($("#altura").val() != "" && $("#peso").val() != "") {
                var imc = (parseFloat($("#peso").cleanVal()) / (parseFloat($("#altura").cleanVal()) * parseFloat($("#altura").cleanVal())) * 10000).toFixed(2);
                $("#imc").text("Seu IMC ?? de " + imc + " kg/m??");
                if (imc < 18.5) {
                    $("#linha1").addClass("bg-pink");
                    $("#linha2, #linha3, #linha4").removeClass("bg-pink");
                } else if (imc > 18.49 && imc < 25) {
                    $("#linha2").addClass("bg-pink");
                    $("#linha1, #linha3, #linha4").removeClass("bg-pink");
                } else if (imc > 24.99 && imc < 30) {
                    $("#linha3").addClass("bg-pink");
                    $("#linha1, #linha2, #linha4").removeClass("bg-pink");
                } else {
                    $("#linha4").addClass("bg-pink");
                    $("#linha1, #linha2, #linha3").removeClass("bg-pink");
                }
                $("#tabela_imc").removeClass("d-none");
            } else {
                if ($("#altura").val() == "") {
                    alertaPreenchimento('#altura', '#label_altura');
                }
                if ($("#peso").val() == "") {
                    alertaPreenchimento('#peso', '#label_peso');
                }
            }
        });
    </script>

</body>

</html>