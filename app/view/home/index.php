<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/styles/home.css">
    <script src="https://kit.fontawesome.com/e54de00844.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/Simbol - Ecologic.svg" type="image/svg">
    <title>EcoLogic</title>
</head>

<body>
    <nav id="header">
        <div id="header-links">
            <img id="logo" height="57" src="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/logo.svg" alt="Ecologic">
            <ul>
                <li class="selected">
                    <a class='links ' href="#home" onclick="">Home</a>
                </li>
                <li>
                    <a class='links' href="#team-page">Equipe</a>
                </li>
                <li>
                    <a class='links' href="#carbon-page">Pegada de carbono</a>
                </li>
                <li>
                    <a class='links' href="#about-page">Sobre</a>
                </li>
                <li>
                    <a class='links' href="#contact">Contato</a>
                </li>
            </ul>
        </div>

        <div id="div-button-header">
            <button class="pushable" onclick="location.href='ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/login'" type="button">
                <span class="front">
                    Calcular
                </span>
            </button>
        </div>

    </nav>
    
    <div id="container">

        <section id="home">
            <div id="content-home">
                <h1 class="title home">
                    Comece ajudando <br />o planeta com um <br />simples cálculo.
                </h1>
                <p class="paragraph">
                    Conheça o software desenvolvido pelos<br />alunos do Senai. Imaginado para mudar o mundo
                    <br />e salvar o planeta. Conheça Eco2logic, <br />ainda melhor que o primeiro.
                </p>
                <div id="div-button-menu">
                    <button class="pushable" onclick="location.href='ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/login'">
                        <span class="front">
                            Calcular
                        </span>
                    </button>
                </div>
            </div>
            <img id="simbol large" height="412" src="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/Simbol - EcologicLarge.svg" alt="Ecologic" />
            <a href="#team-page" id="div-arrow-down">
                <img id="arrow-down" src="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/Vector.svg" alt="arrow down">
            </a>
        </section>
        <section id="team-page">
            <div id="team-page-content">
                <h1 class="title section team">Equipe</h1>
                <div style="display: flex; flex-direction: row; gap: 10vw">
                    <div class="team-card"
                        style=" background-image:linear-gradient(#00000000,#00000000, #000), url(ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/Rectangle\ 7.svg);">
                        <div class="team-card-content">
                            <h1 class="subtitle">João<br>Guimarães</h1>
                            <p class="paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi scelerisque mi sit
                                amet
                            </p>
                        </div>
                    </div>
                    <div class="team-card"
                        style="background-image:linear-gradient(#00000000,#00000000, #000), url(ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/image\ 1.svg)">
                        <div class="team-card-content">
                            <h1 class="subtitle">Margiory<br>Simas</h1>
                            <p class="paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi scelerisque mi sit
                                amet
                            </p>
                        </div>
                    </div>
                    <div class="team-card"
                        style="background-image: linear-gradient(#00000000,#00000000, #000), url(ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/image\ 2.svg);">
                        <div class="team-card-content">
                            <h1 class="subtitle">Mª Eduarda<br>Aguiar</h1>
                            <p class="paragraph">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi scelerisque mi sit
                                amet<br />
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="carbon-page">
            <div id="carbon-content">
                <div id="carbon-div-text">
                    <h1 class="title" style="margin-top:15vh">
                        Pegada de Carbono
                    </h1>
                    <h3 class="subtitle">
                        Muitas dúvidas?

                    </h3>

                    <input type="radio" id="btnControl" name="drop" />

                    <label class="dropdown" for="btnControl">
                        <div class="dropdown-title">
                            <p class="title-dropdown">
                                O que é pegada de carbono?
                            </p>
                            <span id="plus-image">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </div>
                        <div class="dropdown-content">
                            <p class="paragraph">
                                A pegada de carbono foi criada para medir as emissões dos gases
                                responsáveis pelo efeito
                                estufa, independente do tipo de gás emitido, são convertidas em carbono equivalente.
                                Esses gases são emitidos na atmosfera durante o ciclo de vida de um produto, de
                                processos ou de serviços. São exemplos de atividades que geram emissões a queima de
                                combustíveis fósseis, o cultivo de arroz, a criação de pastagem para gado, o
                                desmatamento, as queimadas, a produção de cimento, entre outras.
                            </p>
                        </div>
                    </label>

                    <input type="radio" id="btnControl-1" name="drop" />

                    <label class="dropdown" for="btnControl-1">
                        <div class="dropdown-title">
                            <p class="title-dropdown">
                                Para que serve a pegada de carbono?
                            </p>
                            <span id="plus-image">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </div>
                        <div class="dropdown-content">
                            <p class="paragraph">
                                Com a pegada de carbono podemos analisar os impactos que causamos na atmosfera e as
                                mudanças climáticas provocadas pelo lançamento de gases do efeito estufa a partir de
                                cada produto, processo ou serviço que consumimos. Toda atitude humana traz algum impacto
                                para o planeta, por menor que seja, e o modo de vida contemporâneo emite muito mais
                                gases do que a Terra é capaz de absorver, ou seja, estamos exigindo muito de sua
                                biocapacidade.
                            </p>
                        </div>
                    </label>

                    <input type="radio" id="btnControl-2" name="drop" />

                    <label class="dropdown" for="btnControl-2">
                        <div class="dropdown-title">
                            <p class="title-dropdown">
                                O que pode ser feito?
                            </p>
                            <span id="plus-image">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </div>
                        <div class="dropdown-content">
                            <p class="paragraph">
                                Reduzir significativamente a pegada de carbono é um passo essencial para acabar com o
                                abuso ecológico e viver dentro dos limites e meios propiciados pelo nosso planeta.
                                Trata-se, ainda, do passo mais fundamental para conter as mudanças climáticas –
                                resultado mais importante da nossa gastança ecológica em excesso.
                            </p>
                        </div>
                    </label>

                    <input type="radio" id="btnControl-3" name="drop" />

                    <label class="dropdown" for="btnControl-3">
                        <div class="dropdown-title">
                            <p class="title-dropdown">
                                Como calcular sua pegada de carbono?
                            </p>
                            <span id="plus-image">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </div>
                        <div class="dropdown-content">
                            <p class="paragraph">
                                É possível fazer uma estimativa de qual é o tamanho da sua pegada de carbono. A nossa
                                empresa Eco2Logic calcula a sua pegada de carbono por meio de algumas informações
                                básicas – o valor é aproximado, mas ajuda a ter uma ideia e repensar nossas escolhas
                                cotidianas.
                            </p>
                        </div>
                    </label>

                </div>
                <image id="image-fabric" src="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/fabric.svg" />
            </div>
        </section>
        <section id="about-page">
            <div id="carbon-content">
                <div id="carbon-div-text">
                    <h1 class="title section" style="margin-top:15vh">
                        Sobre o projeto
                    </h1>
                    <h3 class="subtitle" style="color: #000;">
                        Nos conheça melhor
                    </h3>

                    <p class="paragraph" style="color: #000">
                        <br>
                        De acordo com a WWF (World Wide Fund for Nature), fundação na qual que visa mudar a atual
                        trajetória de degradação socioambiental, a pegada de carbono da humanidade é a principal causa
                        das mudanças climáticas. Devido ao fato de que geramos emissões gás carbônico em ritmo muito
                        mais rápido do que é possível absorver, existe um acúmulo de gás carbônico na atmosfera e no
                        oceano.
                        <br>
                        Considerando a necessidade de medidas efetivas para redução do impacto ambiental, a Eco2Logic
                        sentiu a preocupação de calcular a "pegada de carbono" relativa à emissão de CO2 da sua frota de
                        veículos utilizados por seus colaboradores.
                        <br>
                        A nossa empresa é uma organização de suporte de rede que atua em toda a grande Florianópolis
                        desde 2011. Ao todo possuímos 107 colaboradores alocados em sua matriz na região central de
                        Florianópolis. Contamos com 22 colaboradores habilitados a conduzir os veículos de atendimento.
                        <br>
                        Quando um chamado é aberto é verificado o endereço de atendimento e é alocado um carro
                        disponível e colaborador habilitado para a condução do veículo. Ao finalizar o chamado deve ser
                        cadastrada a quilometragem pelo colaborador.

                    </p>
                </div>
                <image id="image-fabric" src="ec2-52-90-93-141.compute-1.amazonaws.com/Ecologic/assets/images/transit.jpeg" />
            </div>
        </section>
        <section id="contact">
            <div id="contact-content">
                <div style="height: 100%;">
                    <h2 class="title ">Fale Conosco!</h2>
                    <h4 class="title-dropdown" style="margin-bottom: 5%;">
                        Tire suas duvidas e mande sugestões
                    </h4>
                    <p class="paragraph">Assunto</p>
                    <input type="text" id="fname" name="subject">
                    <div id="contact-content-row">
                        <div style="width: 100%;">
                            <p class="paragraph">Nome</p>
                            <input type="text" id="fname" name="firstname" placeholder="Your name.."
                                style="width: 100%;">
                        </div>
                        <div style="width: 100%;">
                            <p class="paragraph">Celular</p>
                            <input type="text" id="fname" name="cellphone" placeholder="(XX) 00000-0000">
                        </div>
                    </div>
                    <p class="paragraph">E-mail</p>
                    <input type="text" id="fname" name="E-mail" placeholder="abc@gmail.com">

                    <p class="paragraph">Escreva a sua mensagem (de até 0/255 caracteres) *</p>
                    <textarea type="text" id="ftext-area" name="mensage" placeholder="Digite sua mensagem..."
                        maxlength="255"></textarea>
                </div>
                <button class="pushable" style="margin-top: 8px; align-self: flex-end;">
                    <span class="front">
                        Enviar!
                    </span>
                </button>
            </div>

        </section>
    </div>
    <script src="index.js"></script>
</body>

</html>