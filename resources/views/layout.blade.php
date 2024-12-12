<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/reset.css" />
    <link rel="stylesheet" href="../CSS/create.css" />
    <link rel="stylesheet" href="../CSS/dashboard-style.css" />
    <link rel="stylesheet" href="../CSS/wrap.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link  href="../css/main.css" rel="stylesheet">

    @vite(['resources/js/sidebar.js'])
    @vite(['resources/js/section-btn'])
    @vite(['resources/js/mask'])
    @vite(['resources/js/list'])
    @vite(['resources/js/toggles'])
    @vite(['resources/js/map.'])
</head>
<body>
<div id="header">
        <button id="show-sidebar"><i class="fa-solid fa-bars"></i></button>
        <div class="right">
            <div id="btnSale">+ Nova Venda</div>
        </div>
    </div>
    <div id="sidebar">
      <button id="close-sidebar"><i class="fa-solid fa-xmark"></i></button>
      <div id="accordian">
        <ul class="show-dropdown main-navbar">
          <div class="selector-active">
            <div class="top"></div>
            <div class="bottom"></div>
          </div>
          <li id="user" class="active">
            <a class="delayed-link" href="#">
              <div class="perfil">
                <img
                  src="https://yyfii.github.io/img_codepen/avatarFemale.png"
                  alt="Perfil"
                />
              </div>
              <div id="text">
                <span class="item">Funcionário</span>
              </div>
            </a>
          </li>
          <li>
            <a class="delayed-link" href="#"
              ><i class="fas fa-tachometer-alt"></i
              ><span class="item">Dashboard</span></a
            >
          </li>
          <li>
            <a class="delayed-link" href="#"
              ><i class="far fa-address-book"></i
              ><span class="item">Funcionários</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="far fa-clone"></i><span class="item">Clientes</span></a
            >
          </li>
          <li>
            <a class="delayed-link" href="#"
              ><i class="fa-regular fa-clipboard"></i
              ><span class="item">Produtos</span></a
            >
          </li>
          <li>
            <a class="delayed-link" href="#"
              ><i class="fa-solid fa-truck-field-un"></i
              ><span class="item">Fornecedores</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="fas fa-money-check-alt"></i
              ><span class="item">Financeiro</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="fa-solid fa-money-bill-trend-up"></i
              ><span class="item">Vendas</span></a
            >
          </li>
          <li>
            <a href="javascript:void(0);"
              ><i class="far fa-envelope"></i
              ><span class="item">Mensagens</span></a
            >
          </li>
          <li id="btnExit">
            <a href="javascript:void(0);"
              ><i id="exit" class="fa-regular fa-circle-xmark"></i
              ><span class="item">Sair</span></a
            >
          </li>
        </ul>
      </div>
    </div>
    <div id="content">
        <div class="options">
            <div class="top">
                <a href="create-funcionario.php"><button id="add">
                <i class="fa-solid fa-square-plus"></i>
                    <p>Novo Funcionário</p></button></a>
            </div>
            <div class="listar">
            <a href="listar.php">
                <button id="estoque">
                <i class="fa-solid fa-list"></i>
                    <p>Lista de Funcionários</p>
                </button>
                </a>
            </div>
        </div>
<nav class="navbar bg-body-secondary fixed-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MercadoBom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MercadoBom</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>

<br/>

<div class="container">
    <br><br>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Funcionários</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Novo Funcionário</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Detalhes</button>
  </li>

</ul>
<div class="tab-content" id="pills-tabContent">
<!-- Lista de funcionários -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
      <!-- Tabela -->
      <div class="card">
        <div class="card-body">
        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">CPF</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo Contr.</th>
            <th scope="col">Data Nasc. </th>
            <th scope="col">... </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>53432423432452</td>
            <td>Mark</td>
            <td>Estágio</td>
            <td>14/40/2008</td>
            <td class="icons-table">
                                  <div class="td-group">
                                      <a onclick="openConfirmation()">
                                          <img src="https://yyfii.github.io/img_codepen/icons8-cancelar-50.png" alt="delete" class="icon"/>
                                          <span id="excluir" class="icon-hover">Excluir</span>
                                      </a>
                                  </div>
                                  <div class="td-group">
                                      <a href="#">
                                          <img src="https://yyfii.github.io/img_codepen/edit.png" alt="edit" class="icon" />
                                          <span id="edit"  class="icon-hover">Editar</span>
                                      </a>
                                  </div>
                                  <div class="td-group">
                                      <a href="#">
                                          <img src="https://yyfii.github.io/img_codepen/icons8-conexão-desligada-50.png" alt="more" class="icon" />
                                          <span id="more"  class="icon-hover">Detalhes</span>
                                      </a>
                                  </div>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>53432423432452</td>
            <td>Mark</td>
            <td>Estágio</td>
            <td>14/40/2008</td>
            <td>14/40/2008</td>
            <td class="icons-table">
                                  <div class="td-group">
                                      <a onclick="openConfirmation()">
                                          <img src="https://yyfii.github.io/img_codepen/icons8-cancelar-50.png" alt="delete" class="icon"/>
                                          <span id="excluir" class="icon-hover">Excluir</span>
                                      </a>
                                  </div>
                                  <div class="td-group">
                                      <a href="#">
                                          <img src="https://yyfii.github.io/img_codepen/edit.png" alt="edit" class="icon" />
                                          <span id="edit"  class="icon-hover">Editar</span>
                                      </a>
                                  </div>
                                  <div class="td-group">
                                      <a href="#">
                                          <img src="https://yyfii.github.io/img_codepen/icons8-conexão-desligada-50.png" alt="more" class="icon" />
                                          <span id="more"  class="icon-hover">Detalhes</span>
                                      </a>
                                  </div>
            </td>

          </tr>
          <tr>
            <th scope="row">3</th>
            <td>53432423432452</td>
            <td>Mark</td>
            <td>Estágio</td>
            <td>14/40/2008</td>
            <td class="icons-table">
                                  <div class="td-group">
                                      <a onclick="openConfirmation()">
                                          <img src="https://yyfii.github.io/img_codepen/icons8-cancelar-50.png" alt="delete" class="icon"/>
                                          <span id="excluir" class="icon-hover">Excluir</span>
                                      </a>
                                  </div>
                                  <div class="td-group">
                                      <a href="#">
                                          <img src="https://yyfii.github.io/img_codepen/edit.png" alt="edit" class="icon" />
                                          <span id="edit"  class="icon-hover">Editar</span>
                                      </a>
                                  </div>
                                  <div class="td-group">
                                      <a href="#">
                                          <img src="https://yyfii.github.io/img_codepen/icons8-conexão-desligada-50.png" alt="more" class="icon" />
                                          <span id="more"  class="icon-hover">Detalhes</span>
                                      </a>
                                  </div>
            </td>
          </tr>
        </tbody>
      </table> 
      <div id="confirmationPopup" class="popup">
                  <div class="popup-content">
                  <p>Tem certeza de que deseja deletar este funcionário?</p>
                  <button onclick="confirmDelete()"><a href="#">Sim</a></button>
                  <button onclick="closeConfirmation()">Não</button>
                  </div>
              </div>
        </div>
      </div>
  </div>
<!-- Novo funcionário -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
  <div class="container">
          <div class="form-container">
            <form action="create.php" method="post">

                <div class="itens-form">
                  <!--Seção de Dados pessoais-->
                  <button id="step1-btn" class="step-btn" type="button"></button><p class="title-wrap">  Dados pessoais</p>
                  <div class="wrap none" id="step1">
                    <label for="nome_funcionario">Nome</label>
                      <input class="nome" type="text" id="nome_funcionario" maxlength="40" name="nome_funcionario" placeholder="Nome completo" required />
                      <label for="nasc_funcionario">Data de nascimento</label>
                      <input class="nome" type="text" id="nasc_funcionario" name="nasc_funcionario" placeholder="00/00/00"  required />
                      <label for="cpf_funcionario">CPF</label>
                      <input class="nome" type="text" id="cpf_funcionario" name="cpf_funcionario" placeholder="000.000.000-00" required />
                      <div class="categorias">
                      <label for="tipo_usuario">Usuario </label>
                      <select name="tipo_usuario" id="tipo_usuario" class="select" required>
                      <option value="" disabled selected>Selecione um tipo de usuário</option>
                          <option value='1'>Admin</option>
                      </select>
                    </div>
                  </div>
                  <br/>

                  <!--Seção Informações de Contato-->
                  <button id="step2-btn" type="button" class="step-btn"></button><p class="title-wrap">Informações de Contato</p>
                  <div class="wrap none" id="step2">
                    <label for="tel_funcionario">Número de Telefone</label>
                    <input class="nome" type="tel" id="tel_funcionario" name="tel_funcionario" placeholder="(00) 0000-0000" required />
                    <label for="email_funcionario">Email</label>
                    <input class="nome" type="email" id="email_funcionario" name="email_funcionario" placeholder="pdvvendas@gmail.com" required />
                  </div>
                  <br/>

                  <!--Seção de Endereço-->
                  <button id="step3-btn" type="button" class="step-btn"></button><p class="title-wrap">Endereço</p>
                  <div class="wrap none" id="step3">
                      <div>
                          <label for="address">Endereço (localização google maps)</label>
                          <input type="text" id="address" name="address" placeholder="R. Tupy Guarani, 238, São Gonçalo do Piauí - PI, 64435-000" class="nome" name="end">
                          <button type="button" id="findButton">Mostrar no mapa</button>
                          <p class="title-wrap">Endereço no mapa</p>
                          <div id="map" style="display: block;"></div>
                      </div>
                  </div>
                  <br/>

                  <!--Contrato de Trabalho-->
                  <button id="step4-btn" type="button" class="step-btn"></button><p class="title-wrap">Contrato de Trabalho</p>
                  <div class="wrap none" id="step4">
                    <label class="contrato" for="tipo_funcionario">Tipo de Funcionário</label>
                    <div class="categorias" class="contrato">
                      <select name="tipo_funcionario" id="tipo_funcionario" class="select" required>
                      <option selected>Selecione</option>
                          <option value='1'>Estagiário</option>
                      </select>
                    </div>
                    <div class="categorias">
                      <label for="departamento">Departamento </label>
                      <select name="departamento_id" id="departamento" class="select" required>
                      <option selected>Selecione</option>
                          <option value='1'>TI</option>
                      </select>
                    </div>
                    <label class="contrato" for="salario">Salário</label>
                    <input type="salary" id="salario" name="salario" placeholder="R$ 0,00" required />
                    <p></p>
                    <label class="contrato" for="escala">Jornada de Trabalho</label>
                    <input class="nome" type="text" id="escala" name="escala" placeholder="5x2" required />

                    <p></p>
                    <label for="beneficios">Beneficios</label>
                    <div class="checkbox-group">
                      <input type="checkbox" id="valeAlimentacao" name="benefits[]" value="vale-alimentação" class="custom-checkbox">
                      <label for="valeAlimentacao" class="custom-label">Vale Alimentação</label>
                    </div>
                
                    <div class="checkbox-group">
                        <input type="checkbox" id="valeTransporte" name="benefits[]" value="vale-transporte" class="custom-checkbox">
                        <label for="valeTransporte" class="custom-label">Vale Transporte</label>
                    </div>
                    
                    <div class="checkbox-group">
                        <input type="checkbox" id="seguroSaude" name="benefits[]" value="seguro-saude" class="custom-checkbox">
                        <label for="seguroSaude" class="custom-label">Seguro Saúde</label>
                    </div>
                  </div>
                  <br/>

                  <!--Formas de pagamento-->
                  <button id="step5-btn" type="button" class="step-btn"></button><p class="title-wrap">Formas de pagamento</p>
                  <div class="wrap none" id="step5">
                    <p class="title-wrap">Depósito bancário</p>
                    <p></p>
                    <label class="contrato" for="banco">Banco</label>
                    <input class="nome medium" type="text" id="banco" name="banco" placeholder="Banco do Brasil" required />

                    <label class="contrato" for="num_banco">Nº do banco</label>
                    <input class="nome small" type="text" id="num_banco" name="num_banco" placeholder="001" required />

                          
                    <label class="contrato" for="agencia">Agência</label>
                    <input class="nome small" type="text" id="agencia" name="agencia" placeholder="00000-00" required />

                    <label class="contrato" for="tipo_conta">Tipo de Conta</label>
                    <div class="categorias contrato">
                      <select name="tipo_conta" id="tipo_conta" class="select medium-m contrato" required>
                        <option selected>Selecione</option>
                        <option>Corrente</option>
                        <option>Polpança</option>
                      </select>
                    </div>

                    <br/>
                    <p class="title-wrap">PIX</p>
                    <p></p>
                    <label for="chave_pix">Tipo da chave</label>
                    <div class='checkbox-group'>
                        <input type='checkbox' id='pix_CPF' name='pix[]' value='CPF' class='custom-checkbox'>
                        <label for='pix_CPF' class='custom-label'>CPF</label>
                    </div>
                    <div class='checkbox-group'>
                        <input type='checkbox' id='pix_Email' name='pix[]' value='Email' class='custom-checkbox '  >
                        <label for='pix_Email' class='custom-label'>Email</label>
                    </div>
                    <div class='checkbox-group'>
                        <input type='checkbox' id='pix_Celular' name='pix[]' value='Celular' class='custom-checkbox ' >
                        <label for='pix_Celular' class='custom-label'>Celular</label>
                    </div>
                  <br/>
                </div>
                <div class="itens-form">
                  <div class="button-wrapper">
                    <input id="btn-submit-create" type="submit" value="Salvar" />
                  </div>
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>
<!-- Detalhes funcionário -->
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
  <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" async
></script>
<script type="text/javascript" src="https://kit.fontawesome.com/84d7270ddc.js" crossorigin="anonymous" async></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHMmri7qvU8C4xhKFhi5ZHj1Hw9bSvjWw&libraries=places&callback=initMap" async defer></script>
</body>
</html>