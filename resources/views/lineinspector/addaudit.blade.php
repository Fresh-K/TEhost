@extends('layouts.lineinspector')

@section('content')



{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>New Audit</title>--}}

{{--    <!-- jQuery -->--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

{{--    <!-- Smart Wizard CSS and JS -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/smartwizard@4.4.2/dist/css/smart_wizard.min.css" rel="stylesheet" type="text/css" />--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/smartwizard@4.4.2/dist/js/jquery.smartWizard.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container-fluid">--}}
{{--    <div class="col-xl-12 col-lg-12">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h4 class="card-title"> New Audit</h4>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="basic-form">--}}
{{--                    <form method="post" action="{{route('audit-add')}}">--}}
{{--                        @error('q1')--}}
{{--                        <div class="alert alert-danger alert-dismissible fade show my-2">--}}
{{--                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>--}}
{{--                            <strong>Error!</strong> {{$message}}--}}
{{--                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        @enderror--}}
{{--                        @csrf--}}
{{--                        <div class="form-group mb-0">--}}
{{--                            <label>Machine</label>--}}
{{--                            <div class="form-group mb-0">--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-1"> CC64-1</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-2"> CC64-2</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-3"> CC64-3</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-4"> CC64-4</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-5"> CC64-5</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-6"> CC64-6</label><br>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-7"> CC64-7</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-8"> CC64-8</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-9"> CC64-9</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-10"> CC64-10</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-11"> CC64-11</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="KOMAX"> KOMAX</label>--}}
{{--                            </div>--}}
{{--                            <label>SHIFt</label>--}}
{{--                            <div class="form-group mb-0">--}}
{{--                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="M">M</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="S">S</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="N">N</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="smartwizard">--}}
{{--                            <ul>--}}
{{--                                <!-- Step navigation will be generated here -->--}}
{{--                            </ul>--}}
{{--                            <div id="tables"></div>--}}
{{--                        </div>--}}

{{--                        <button type="button" id="show-table2" class="btn btn-primary">Next</button>--}}
{{--                        <button type="submit" class="btn btn-primary" id="submit-btn" style="display: none;">Submit</button>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    let currentStep = 0;--}}
{{--    let machines = [];--}}

{{--    function generateTable() {--}}
{{--        if (currentStep >= machines.length) {--}}
{{--            document.getElementById('show-table2').style.display = 'block';--}}
{{--            document.getElementById('submit-btn').style.display = 'inline-block';--}}
{{--            return;--}}
{{--        }--}}

{{--        // Clear the Smart Wizard navigation--}}
{{--        $('.smartwizard ul').empty();--}}
{{--        document.getElementById('tables').innerHTML = '';--}}

{{--        // Create a step for the current machine--}}
{{--        const machine = machines[currentStep];--}}
{{--        const machineName = machine.value;--}}
{{--        const step = `--}}
{{--                <li>--}}
{{--                    <a href="#step-1">${machineName}</a>--}}
{{--                </li>--}}
{{--            `;--}}
{{--        $('.smartwizard ul').append(step);--}}

{{--        const table = `--}}

{{--                                    <div class="card-body">--}}
{{--                                        <div class="table-responsive">--}}
{{--                                            <table class="table table-bordered table-responsive-sm">--}}
{{--                                                <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th>N</th>--}}
{{--                                                        <th>Type</th>--}}
{{--                                                        <th>Points a Verifier</th>--}}
{{--                                                        <th>Frequence</th>--}}
{{--                                                        <th>Actions</th>--}}
{{--                                                        <th>Status</th>--}}

{{--                                                    </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody>--}}

{{--                                                    <tr>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <th>Maintenace 1er niveau (${machineName})</th>--}}
{{--                                                        <td>Vérifier la disponibilité et le remplissage du Checklist de Maintenance 1er niveau </td>--}}
{{--                                                        <td>--}}
{{--                                                            Chaque début shift--}}
{{--                                                        </td>--}}
{{--                                                        <td>Corriger l'anomalie immédiatement</td>--}}
{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>2</td>--}}
{{--                                                        <th>Accesoire Machine</th>--}}
{{--                                                        <td>Vérifier la disponibilité et le fonctionnement des : (Gripper,Vacuum machin,impriment Scanner) </td>--}}
{{--                                                        <td>  3 fois par shift</td>--}}
{{--                                                        <td rowspan="3">1- Arrêter le processus </br> 2- Refuser la production si nécessaire </br> 3- Corriger le processus</td>--}}
{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>3</td>--}}
{{--                                                        <th>Enfilment</th>--}}
{{--                                                        <td>Vérifier l'équipement de l'enfilement : disque de protection terminaux, roues de redressement, courroie d'entrainement, détecteur fin rouleaux, protection de bobine</td>--}}
{{--                                                        <td>Chaque début shift</td>--}}

{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q3" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>4</td>--}}
{{--                                                        <th>Bloc des Lames</th>--}}
{{--                                                        <td>Vérifier visuellemnt la conformité et l'état des lames </td>--}}
{{--                                                        <td>3 fois par shift</td>--}}

{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <br>--}}
{{--                                                <td>5</td>--}}
{{--                                                <th>Moyen de mesure et de controle</th>--}}
{{--                                                <td>--}}
{{--                                                    Vérifier l'état, le fonctionnement et la calibration du :</br>--}}
{{--                                                    - Comparateur</br>--}}
{{--                                                    - Dynamomètre (Machine de traction)</br>--}}
{{--                                                    - Règle ou ruban métrique--}}
{{--                                                </td>--}}
{{--                                                <td>Chaque début shift</td>--}}
{{--                                                <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>--}}
{{--                                                <td>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="OK"> OK</label>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="N/A"> N/A</label>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="NC/C"> NC/C</label>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="NC"> NC</label>--}}
{{--                                                </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>6</td>--}}
{{--                                                    <th>Controle de produit non conforme</th>--}}
{{--                                                    <td>Est-ce que le Produit non conforme est identifié et contrôlé conformément à la procédure de produit non conforme?</td>--}}
{{--                                                    <td>3 fois par shift</td>--}}
{{--                                                    <td>1 - Refus du produit si nécessaire</br> 2 - Analyse</br> 3 - Correction Etiquette d'identification</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>7</td>--}}
{{--                                                    <th>Etiquette d'identification</th>--}}
{{--                                                    <td>1</td>--}}
{{--                                                    <td>1</td>--}}
{{--                                                    <td>1</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>8</td>--}}
{{--                                                    <th>Documentations/Aide Visuelle</th>--}}
{{--                                                    <td>Vérifier la présence et le bon remplissage de l'ensembles des documents : (carte de contrôle,SWI,QIP ,Aide Visuelle) </td>--}}
{{--                                                    <td>Chaque début shift </td>--}}
{{--                                                    <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>9</td>--}}
{{--                                                    <th>5S</th>--}}
{{--                                                    <td>Vérifier l'ordre et la propreté des Machines </td>--}}
{{--                                                    <td>3 fois par shift </td>--}}
{{--                                                    <td>Corriger l'anomalie immédiatement </td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>10</td>--}}
{{--                                                    <th>Stockage</th>--}}
{{--                                                    <td>Vérifier si la zone de stockage ne présente aucun risque sur le produit Vérifier que tout les terminaux sont protéger avec des protection plastic </td>--}}
{{--                                                    <td>3 fois par shift</td>--}}
{{--                                                    <td>Corriger l'anomalie immédiatement</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>11</td>--}}
{{--                                                    <th>Parametres</th>--}}
{{--                                                    <td>--}}
{{--                                                        Vérifier le bon fonctionnement du DATA-Loading--}}

{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        Chaque début shift--}}
{{--                                                    </td>--}}
{{--                                                    <td> 1- Arrêter le processus </br>2- Refuser la production</br> 3- Corriger le processus</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="NC"> NC</label>--}}
{{--                                                    </td>--}}

{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                                <p id="result"></p>--}}
{{--                                                <input type="hidden"  name="score" value="">--}}





{{--                        </table>--}}

{{--                    </div>--}}
{{--                </div>--}}


{{--                </form>`;--}}
{{--        document.getElementById('tables').insertAdjacentHTML('beforeend', table);--}}

{{--        // Initialize the Smart Wizard--}}
{{--        $('.smartwizard').smartWizard({--}}
{{--            selected: 0,--}}

{{--            theme: 'default',--}}
{{--            transitionEffect: 'fade',--}}
{{--            showStepURLhash: false,--}}
{{--            toolbarSettings: {--}}
{{--                toolbarPosition: 'bottom',--}}
{{--                toolbarButtonPosition: 'right',--}}
{{--                showNextButton: false,--}}
{{--                showPreviousButton: false--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}

{{--    document.querySelectorAll('input[name="machine[]"]').forEach(machine => {--}}
{{--        machine.addEventListener('click', () => {--}}
{{--            machines = Array.from(document.querySelectorAll('input[name="machine[]"]:checked'));--}}
{{--            currentStep = 0;--}}
{{--            generateTable();--}}
{{--        });--}}
{{--    });--}}

{{--    // Move to the next step when the "Next" button is clicked--}}
{{--    document.getElementById('show-table2').addEventListener('click', () => {--}}
{{--        currentStep++;--}}
{{--        generateTable();--}}
{{--    });--}}

{{--    // Initialize the form with the first step--}}
{{--    document.querySelectorAll('input[name="machine[]"]').forEach(machine => {--}}
{{--        machine.addEventListener('click', () => {--}}
{{--            machines = Array.from(document.querySelectorAll('input[name="machine[]"]:checked'));--}}
{{--            currentStep = 0;--}}
{{--            generateTable();--}}
{{--            document.getElementById('show-table2').style.display = 'inline-block';--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
{{-----------------------------------------------------------------------------------------------}}

{{--<div class="container-fluid">--}}
{{--    <div class="col-xl-12 col-lg-12">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h4 class="card-title"> New Audit</h4>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="basic-form">--}}
{{--                    <form method="post" action="{{route('audit-add')}}">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group mb-0">--}}
{{--                            <label>Machine</label>--}}
{{--                            <div class="form-group mb-0">--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-1"> CC64-1</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-2"> CC64-2</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-3"> CC64-3</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-4"> CC64-4</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-5"> CC64-5</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-6"> CC64-6</label><br>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-7"> CC64-7</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-8"> CC64-8</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-9"> CC64-9</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-10"> CC64-10</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-11"> CC64-11</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="KOMAX"> KOMAX</label>--}}
{{--                            </div>--}}
{{--                            <label>SHIFt</label>--}}
{{--                            <div class="form-group mb-0">--}}
{{--                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="M">M</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="S">S</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="N">N</label>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div id="tables"></div>--}}

{{--                        <!-- Table container element -->--}}
{{--                        <div id="table-container"></div>--}}

{{--                        <script>--}}
{{--                            function generateTable() {--}}
{{--                                // Get the checked machines--}}
{{--                                const machines = document.querySelectorAll('input[name="machine[]"]:checked');--}}

{{--                                // Remove existing tables--}}
{{--                                document.getElementById('tables').innerHTML = '';--}}

{{--                                // Create a table for each checked machine--}}
{{--                                machines.forEach((machine, index) => {--}}
{{--                                    const machineName = machine.value;--}}
{{--                                    const table = `--}}

{{--                                    <div class="card-body">--}}
{{--                                        <div class="table-responsive">--}}
{{--                                            <table class="table table-bordered table-responsive-sm">--}}
{{--                                                <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th>N</th>--}}
{{--                                                        <th>Type</th>--}}
{{--                                                        <th>Points a Verifier</th>--}}
{{--                                                        <th>Frequence</th>--}}
{{--                                                        <th>Actions</th>--}}
{{--                                                        <th>Status</th>--}}

{{--                                                    </tr>--}}
{{--                                                </thead>--}}
{{--                                                <tbody>--}}

{{--                                                    <tr>--}}
{{--                                                        <td>1</td>--}}
{{--                                                        <th>Maintenace 1er niveau (${machineName})</th>--}}
{{--                                                        <td>Vérifier la disponibilité et le remplissage du Checklist de Maintenance 1er niveau </td>--}}
{{--                                                        <td>--}}
{{--                                                            Chaque début shift--}}
{{--                                                        </td>--}}
{{--                                                        <td>Corriger l'anomalie immédiatement</td>--}}
{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>2</td>--}}
{{--                                                        <th>Accesoire Machine</th>--}}
{{--                                                        <td>Vérifier la disponibilité et le fonctionnement des : (Gripper,Vacuum machin,impriment Scanner) </td>--}}
{{--                                                        <td>  3 fois par shift</td>--}}
{{--                                                        <td rowspan="3">1- Arrêter le processus </br> 2- Refuser la production si nécessaire </br> 3- Corriger le processus</td>--}}
{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>3</td>--}}
{{--                                                        <th>Enfilment</th>--}}
{{--                                                        <td>Vérifier l'équipement de l'enfilement : disque de protection terminaux, roues de redressement, courroie d'entrainement, détecteur fin rouleaux, protection de bobine</td>--}}
{{--                                                        <td>Chaque début shift</td>--}}

{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q3" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>4</td>--}}
{{--                                                        <th>Bloc des Lames</th>--}}
{{--                                                        <td>Vérifier visuellemnt la conformité et l'état des lames </td>--}}
{{--                                                        <td>3 fois par shift</td>--}}

{{--                                                        <td>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="OK"> OK</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="N/A"> N/A</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="NC/C"> NC/C</label>--}}
{{--                                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="NC"> NC</label>--}}
{{--                                                        </td>--}}


{{--                                                    </tr>--}}
{{--                                                    <br>--}}
{{--                                                <td>5</td>--}}
{{--                                                <th>Moyen de mesure et de controle</th>--}}
{{--                                                <td>--}}
{{--                                                    Vérifier l'état, le fonctionnement et la calibration du :</br>--}}
{{--                                                    - Comparateur</br>--}}
{{--                                                    - Dynamomètre (Machine de traction)</br>--}}
{{--                                                    - Règle ou ruban métrique--}}
{{--                                                </td>--}}
{{--                                                <td>Chaque début shift</td>--}}
{{--                                                <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>--}}
{{--                                                <td>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="OK"> OK</label>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="N/A"> N/A</label>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="NC/C"> NC/C</label>--}}
{{--                                                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="NC"> NC</label>--}}
{{--                                                </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>6</td>--}}
{{--                                                    <th>Controle de produit non conforme</th>--}}
{{--                                                    <td>Est-ce que le Produit non conforme est identifié et contrôlé conformément à la procédure de produit non conforme?</td>--}}
{{--                                                    <td>3 fois par shift</td>--}}
{{--                                                    <td>1 - Refus du produit si nécessaire</br> 2 - Analyse</br> 3 - Correction Etiquette d'identification</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>7</td>--}}
{{--                                                    <th>Etiquette d'identification</th>--}}
{{--                                                    <td>1</td>--}}
{{--                                                    <td>1</td>--}}
{{--                                                    <td>1</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>8</td>--}}
{{--                                                    <th>Documentations/Aide Visuelle</th>--}}
{{--                                                    <td>Vérifier la présence et le bon remplissage de l'ensembles des documents : (carte de contrôle,SWI,QIP ,Aide Visuelle) </td>--}}
{{--                                                    <td>Chaque début shift </td>--}}
{{--                                                    <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>9</td>--}}
{{--                                                    <th>5S</th>--}}
{{--                                                    <td>Vérifier l'ordre et la propreté des Machines </td>--}}
{{--                                                    <td>3 fois par shift </td>--}}
{{--                                                    <td>Corriger l'anomalie immédiatement </td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>10</td>--}}
{{--                                                    <th>Stockage</th>--}}
{{--                                                    <td>Vérifier si la zone de stockage ne présente aucun risque sur le produit Vérifier que tout les terminaux sont protéger avec des protection plastic </td>--}}
{{--                                                    <td>3 fois par shift</td>--}}
{{--                                                    <td>Corriger l'anomalie immédiatement</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="NC"> NC</label>--}}
{{--                                                    </td>--}}


{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>11</td>--}}
{{--                                                    <th>Parametres</th>--}}
{{--                                                    <td>--}}
{{--                                                        Vérifier le bon fonctionnement du DATA-Loading--}}

{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        Chaque début shift--}}
{{--                                                    </td>--}}
{{--                                                    <td> 1- Arrêter le processus </br>2- Refuser la production</br> 3- Corriger le processus</td>--}}
{{--                                                    <td>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="OK"> OK</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="N/A"> N/A</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="NC/C"> NC/C</label>--}}
{{--                                                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="NC"> NC</label>--}}
{{--                                                    </td>--}}

{{--                                                </tr>--}}
{{--                                                </tbody>--}}
{{--                                                <p id="result"></p>--}}
{{--                                                <input type="hidden"  name="score" value="">--}}





{{--                        </table>--}}

{{--                    </div>--}}
{{--                </div>--}}


{{--                </form>`;--}}
{{--                                    document.getElementById('tables').insertAdjacentHTML('beforeend', table);--}}
{{--                                });--}}
{{--                            }--}}

{{--                            document.querySelectorAll('input[name="machine[]"]').forEach(machine => {--}}
{{--                                machine.addEventListener('click', generateTable);--}}
{{--                            });--}}
{{--                        </script>--}}
{{--                        <button type="submit" class="btn btn-primary">add</button>--}}
{{--                        <script>--}}
{{--                            function countRadios(){--}}
{{--                                var okRadios = document.querySelectorAll('input[type="radio"][value="OK"]');--}}

{{--                                // count how many of them are checked--}}
{{--                                var countOkRadios = 0;--}}
{{--                                okRadios.forEach(function(radio) {--}}
{{--                                    if (radio.checked) {--}}
{{--                                        countOkRadios++;--}}
{{--                                    }--}}
{{--                                });--}}
{{--                                var resultElement = document.getElementById("result");--}}
{{--                                resultElement.innerHTML = '<span style="color: greenyellow;">Score: </span>' + countOkRadios + '/11';--}}
{{--                                document.getElementsByName("score").value = countOkRadios;--}}


{{--                            }--}}

{{--                        </script>--}}
{{--                    </form>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{-------------------------------------------------------------------------}}
{{--<body>--}}
{{--<div class="container-fluid">--}}
{{--    <div class="col-xl-12 col-lg-12">--}}
{{--        <div class="card">--}}
{{--            <div class="card-header">--}}
{{--                <h4 class="card-title">New Audit</h4>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="basic-form">--}}
{{--                    <form method="post" action="{{route('audit-add')}}">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group mb-0">--}}
{{--                            <label>Machine</label>--}}
{{--                            <div class="form-group mb-0">--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-1"> CC64-1</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-2"> CC64-2</label>--}}
{{--                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-3"> CC64-3</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="smartwizard">--}}
{{--                            <ul></ul>--}}
{{--                            <div id="tables"></div>--}}
{{--                        </div>--}}
{{--                        <button type="button" id="show-table2" class="btn btn-primary">Next</button>--}}
{{--                        <button type="submit" class="btn btn-primary" id="submit-btn" style="display: none;">Submit</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    let machines = [];--}}

{{--    function generateTables() {--}}
{{--        // Clear the Smart Wizard navigation--}}
{{--        $('.smartwizard ul').empty();--}}
{{--        document.getElementById('tables').innerHTML = '';--}}

{{--        // Create a step for each checked machine--}}
{{--        machines.forEach((machine, index) => {--}}
{{--            const machineName = machine.value;--}}
{{--            const step = `--}}
{{--          <li>--}}
{{--            <a href="#step-${index + 1}">${machineName}</a>--}}
{{--          </li>--}}
{{--        `;--}}
{{--            $('.smartwizard ul').append(step);--}}

{{--            const table = `--}}
{{--          <div id="step-${index + 1}">--}}
{{--            <div class="card-body">--}}
{{--              <div class="table-responsive">--}}
{{--                <table class="table table-bordered table-responsive-sm">--}}
{{--                  <thead>--}}
{{--                    <tr>--}}
{{--                      <th>N</th>--}}
{{--                      <th>Type</th>--}}
{{--                      <th>Status</th>--}}
{{--                    </tr>--}}
{{--                  </thead>--}}
{{--                  <tbody>--}}
{{--                    <tr>--}}
{{--                      <td>1</td>--}}
{{--                      <th>Maintenance 1er niveau (${machineName})</th>--}}
{{--                      <td>--}}
{{--                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="OK"> OK</label>--}}
{{--                        <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="N/A"> N/A</label>--}}
{{--                      </td>--}}
{{--                    </tr>--}}
{{--                  </tbody>--}}
{{--                  <p id="result"></p>--}}
{{--                  <input type="hidden" name="${machineName}-score" value="">--}}
{{--                </table>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        `;--}}
{{--            document.getElementById('tables').insertAdjacentHTML('beforeend', table);--}}
{{--        });--}}

{{--        // Initialize the Smart Wizard--}}
{{--        $('.smartwizard').smartWizard({--}}
{{--            theme: 'default',--}}
{{--            transitionEffect: 'fade',--}}
{{--            toolbarSettings: {--}}
{{--                toolbarPosition: 'bottom',--}}
{{--            },--}}
{{--            anchorSettings: {--}}
{{--                removeDoneStepOnNavigateBack: true,--}}
{{--                markDoneStep: true,--}}
{{--                anchorClickable: false,--}}
{{--            },--}}
{{--            lang: {--}}
{{--                next: 'Suivant',--}}
{{--                previous: 'Précédent',--}}
{{--            },--}}
{{--        });--}}

{{--        // Show the Smart Wizard and hide the 'Next' button--}}
{{--        $('.smartwizard').show();--}}
{{--        document.getElementById('show-table2').style.display = 'none';--}}
{{--    }--}}

{{--    // Count the number of checked radio buttons--}}
{{--    function countRadios() {--}}
{{--        const radios = document.querySelectorAll('input[type="radio"]:checked');--}}
{{--        document.getElementById('result').textContent = `${radios.length} radios checked`;--}}
{{--    }--}}

{{--    // Listen for changes to the checkboxes--}}
{{--    const checkboxes = document.querySelectorAll('input[type="checkbox"]');--}}
{{--    checkboxes.forEach((checkbox) => {--}}
{{--        checkbox.addEventListener('change', () => {--}}
{{--            machines = Array.from(checkboxes).filter((c) => c.checked);--}}
{{--        });--}}
{{--    });--}}

{{--    // Listen for the 'Next' button click--}}
{{--    document.getElementById('show-table2').addEventListener('click', () => {--}}
{{--        if (machines.length > 0) {--}}
{{--            generateTables();--}}
{{--        } else {--}}
{{--            alert('Please select at least one machine');--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
{{--</body>--}}
<body>
<div class="container-fluid">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Audit</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" action="{{route('audit-add')}}">
                        @csrf
                        <div class="form-group mb-0">
                            <label>Machine</label>
                            <div class="form-group mb-0">
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-1" onchange="updateTables()"> CC64-1</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-2" onchange="updateTables()"> CC64-2</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-3" onchange="updateTables()"> CC64-3</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-4" onchange="updateTables()"> CC64-4</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-5" onchange="updateTables()"> CC64-5</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-6" onchange="updateTables()"> CC64-6</label><br>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-7" onchange="updateTables()"> CC64-7</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-8" onchange="updateTables()"> CC64-8</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-9" onchange="updateTables()"> CC64-9</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-10" onchange="updateTables()"> CC64-10</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="CC64-11" onchange="updateTables()"> CC64-11</label>
                                <label class="radio-inline mr-3"><input type="checkbox" name="machine[]" value="KOMAX" onchange="updateTables()"> KOMAX</label>
                            </div>
                            <label>SHIFt</label>
                            <div class="form-group mb-0">
                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="M">M</label>
                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="S">S</label>
                                <label class="radio-inline mr-3"><input type="radio" name="shift" value="N">N</label>
                            </div>
                        </div>
                        <div class="smartwizard">
                            <ul></ul>
                            <div class="tables-container"></div>
                        </div>
                        <button type="button" id="show-table2" class="btn btn-primary" style="display: none;">Next</button>
                        <button type="submit" class="btn btn-primary" id="submit-btn" style="display: none;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function updateTables() {
        const machines = document.getElementsByName('machine[]');
        const selectedMachines = [];

        // Get the selected machines
        machines.forEach(machine => {
            if (machine.checked) {
                selectedMachines.push(machine);
            }
        });

        // Remove existing tables
        const tablesContainer = document.querySelector('.tables-container');
        tablesContainer.innerHTML = '';

        // Add tables for the selected machines
        selectedMachines.forEach((machine, index) => {
            const machineName = machine.value;
            const table = `
      <div class="table-container" id="step-${index + 1}">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-responsive-sm">
              <thead>
                <tr>
                  <th>N</th>
                  <th>Type</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <th>Maintenance 1er niveau (${machineName})</th>
                  <td>
                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="OK"> OK</label>
                    <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="N/A"> N/A</label>
                  </td>
                </tr>
              </tbody>
              <p id="result"></p>
              <input type="hidden" name="${machineName}-score" value="">
            </table>
          </div>
        </div>
      </div>
    `;
            tablesContainer.insertAdjacentHTML('beforeend', table);
        });

        // Show the first table and hide the rest
        const tableContainers = document.querySelectorAll('.table-container');
        tableContainers.forEach((container, index) => {
            if (index === 0) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });

        // Show the "Next" and "Submit" buttons
        const showTable2Btn = document.querySelector('#show-table2');
        const submitBtn = document.querySelector('#submit-btn');
        showTable2Btn.style.display = 'inline-block';
        submitBtn.style.display = 'none';
        if (tableContainers.length > 1) {
            showTable2Btn.addEventListener('click', () => {
                // Hide the current table and show the next one
                const currentTable = document.querySelector(`#step-${index + 1}`);
                const nextTable = document.querySelector(`#step-${index + 2}`);
                currentTable.style.display = 'none';
                nextTable.style.display = 'block';

                // If this is the last table, hide the "Next" button and show the "Submit" button
                if (index + 2 === tableContainers.length) {
                    showTable2Btn.style.display = 'none';
                    submitBtn.style.display = 'inline-block';
                }
            });
        } else {
            // Only one table, show the "Submit" button
            submitBtn.style.display = 'inline-block';
        }
    }

    // function updateTables() {
    //     const machines = document.getElementsByName('machine[]');
    //     const selectedMachines = [];
    //
    //     // Get the selected machines
    //     machines.forEach(machine => {
    //         if (machine.checked) {
    //             selectedMachines.push(machine);
    //         }
    //     });
    //
    //     // Remove existing tables
    //     const tablesContainer = document.querySelector('.tables-container');
    //     tablesContainer.innerHTML = '';
    //
    //     // Add tables for the selected machines
    //     selectedMachines.forEach((machine, index) => {
    //         const machineName = machine.value;
    //         const table = `
    //   <div class="table-container" id="step-${index + 1}">
    //     <div class="card-body">
    //       <div class="table-responsive">
    //         <table class="table table-bordered table-responsive-sm">
    //           <thead>
    //                                                 <tr>
    //                                                     <th>N</th>
    //                                                     <th>Type</th>
    //                                                     <th>Points a Verifier</th>
    //                                                     <th>Frequence</th>
    //                                                     <th>Actions</th>
    //                                                     <th>Status</th>
    //
    //                                                 </tr>
    //                                             </thead>
    //                                             <tbody>
    //
    //                                                 <tr>
    //                                                     <td>1</td>
    //                                                     <th>Maintenace 1er niveau (${machineName})</th>
    //                                                     <td>Vérifier la disponibilité et le remplissage du Checklist de Maintenance 1er niveau </td>
    //                                                     <td>
    //                                                         Chaque début shift
    //                                                     </td>
    //                                                     <td>Corriger l'anomalie immédiatement</td>
    //                                                     <td>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="OK"> OK</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="N/A"> N/A</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="NC/C"> NC/C</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q1" value="NC"> NC</label>
    //                                                     </td>
    //
    //
    //                                                 </tr>
    //                                                 <tr>
    //                                                     <td>2</td>
    //                                                     <th>Accesoire Machine</th>
    //                                                     <td>Vérifier la disponibilité et le fonctionnement des : (Gripper,Vacuum machin,impriment Scanner) </td>
    //                                                     <td>  3 fois par shift</td>
    //                                                     <td rowspan="3">1- Arrêter le processus </br> 2- Refuser la production si nécessaire </br> 3- Corriger le processus</td>
    //                                                     <td>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="OK"> OK</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="N/A"> N/A</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="NC/C"> NC/C</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q2" value="NC"> NC</label>
    //                                                     </td>
    //
    //
    //                                                 </tr>
    //                                                 <tr>
    //                                                     <td>3</td>
    //                                                     <th>Enfilment</th>
    //                                                     <td>Vérifier l'équipement de l'enfilement : disque de protection terminaux, roues de redressement, courroie d'entrainement, détecteur fin rouleaux, protection de bobine</td>
    //                                                     <td>Chaque début shift</td>
    //
    //                                                     <td>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q3" value="OK"> OK</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="N/A"> N/A</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="NC/C"> NC/C</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" name="${machineName}-q3" oninput="countRadios()" value="NC"> NC</label>
    //                                                     </td>
    //
    //
    //                                                 </tr>
    //                                                 <tr>
    //                                                     <td>4</td>
    //                                                     <th>Bloc des Lames</th>
    //                                                     <td>Vérifier visuellemnt la conformité et l'état des lames </td>
    //                                                     <td>3 fois par shift</td>
    //
    //                                                     <td>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="OK"> OK</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="N/A"> N/A</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="NC/C"> NC/C</label>
    //                                                         <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q4" value="NC"> NC</label>
    //                                                     </td>
    //
    //
    //                                                 </tr>
    //                                                 <br>
    //                                             <td>5</td>
    //                                             <th>Moyen de mesure et de controle</th>
    //                                             <td>
    //                                                 Vérifier l'état, le fonctionnement et la calibration du :</br>
    //                                                 - Comparateur</br>
    //                                                 - Dynamomètre (Machine de traction)</br>
    //                                                 - Règle ou ruban métrique
    //                                             </td>
    //                                             <td>Chaque début shift</td>
    //                                             <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>
    //                                             <td>
    //                                                 <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="OK"> OK</label>
    //                                                 <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="N/A"> N/A</label>
    //                                                 <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="NC/C"> NC/C</label>
    //                                                 <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q5" value="NC"> NC</label>
    //                                             </td>
    //
    //
    //                                             </tr>
    //                                             <tr>
    //                                                 <td>6</td>
    //                                                 <th>Controle de produit non conforme</th>
    //                                                 <td>Est-ce que le Produit non conforme est identifié et contrôlé conformément à la procédure de produit non conforme?</td>
    //                                                 <td>3 fois par shift</td>
    //                                                 <td>1 - Refus du produit si nécessaire</br> 2 - Analyse</br> 3 - Correction Etiquette d'identification</td>
    //                                                 <td>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="OK"> OK</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="N/A"> N/A</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="NC/C"> NC/C</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q6" value="NC"> NC</label>
    //                                                 </td>
    //
    //
    //                                             </tr>
    //                                             <tr>
    //                                                 <td>7</td>
    //                                                 <th>Etiquette d'identification</th>
    //                                                 <td>1</td>
    //                                                 <td>1</td>
    //                                                 <td>1</td>
    //                                                 <td>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="OK"> OK</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="N/A"> N/A</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="NC/C"> NC/C</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q7" value="NC"> NC</label>
    //                                                 </td>
    //
    //
    //                                             </tr>
    //                                             <tr>
    //                                                 <td>8</td>
    //                                                 <th>Documentations/Aide Visuelle</th>
    //                                                 <td>Vérifier la présence et le bon remplissage de l'ensembles des documents : (carte de contrôle,SWI,QIP ,Aide Visuelle) </td>
    //                                                 <td>Chaque début shift </td>
    //                                                 <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>
    //                                                 <td>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="OK"> OK</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="N/A"> N/A</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="NC/C"> NC/C</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q8" value="NC"> NC</label>
    //                                                 </td>
    //
    //
    //                                             </tr>
    //                                             <tr>
    //                                                 <td>9</td>
    //                                                 <th>5S</th>
    //                                                 <td>Vérifier l'ordre et la propreté des Machines </td>
    //                                                 <td>3 fois par shift </td>
    //                                                 <td>Corriger l'anomalie immédiatement </td>
    //                                                 <td>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="OK"> OK</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="N/A"> N/A</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="NC/C"> NC/C</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q9" value="NC"> NC</label>
    //                                                 </td>
    //
    //
    //                                             </tr>
    //                                             <tr>
    //                                                 <td>10</td>
    //                                                 <th>Stockage</th>
    //                                                 <td>Vérifier si la zone de stockage ne présente aucun risque sur le produit Vérifier que tout les terminaux sont protéger avec des protection plastic </td>
    //                                                 <td>3 fois par shift</td>
    //                                                 <td>Corriger l'anomalie immédiatement</td>
    //                                                 <td>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="OK"> OK</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="N/A"> N/A</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="NC/C"> NC/C</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q10" value="NC"> NC</label>
    //                                                 </td>
    //
    //
    //                                             </tr>
    //                                             <tr>
    //                                                 <td>11</td>
    //                                                 <th>Parametres</th>
    //                                                 <td>
    //                                                     Vérifier le bon fonctionnement du DATA-Loading
    //
    //                                                 </td>
    //                                                 <td>
    //                                                     Chaque début shift
    //                                                 </td>
    //                                                 <td> 1- Arrêter le processus </br>2- Refuser la production</br> 3- Corriger le processus</td>
    //                                                 <td>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="OK"> OK</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="N/A"> N/A</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="NC/C"> NC/C</label>
    //                                                     <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="${machineName}-q11" value="NC"> NC</label>
    //                                                 </td>
    //
    //                                             </tr>
    //                                             </tbody>
    //           <p id="result"></p>
    //           <input type="hidden" name="${machineName}-score" value="">
    //         </table>
    //       </div>
    //     </div>
    //   </div>
    // `;
    //         tablesContainer.insertAdjacentHTML('beforeend', table);
    //     });
    //
    //     // Show the first table and hide the rest
    //     const tableContainers = document.querySelectorAll('.table-container');
    //     tableContainers.forEach((container, index) => {
    //         if (index === 0) {
    //             container.style.display = 'block';
    //         } else {
    //             container.style.display = 'none';
    //         }
    //     });
    //
    //     // Show the "Next" and "Submit" buttons
    //     const showTable2Btn = document.querySelector('#show-table2');
    //     const submitBtn = document.querySelector('#submit-btn');
    //     showTable2Btn.style.display = 'inline-block';
    //     submitBtn.style.display = 'none';
    //     if (tableContainers.length > 1) {
    //         showTable2Btn.addEventListener('click', () => {
    //             const currentTable = document.querySelector('.table-container:not([style*="none"])');
    //             const nextTable = currentTable.nextElementSibling;
    //             if (nextTable) {
    //                 currentTable.style.display = 'none';
    //                 nextTable.style.display = 'block';
    //                 if (!nextTable.nextElementSibling) {
    //                     showTable2Btn.style.display = 'none';
    //                     submitBtn.style.display = 'inline-block';
    //                 }
    //             }
    //         });
    //     } else {
    //         submitBtn.style.display = 'inline-block';
    //     }
    // }
    function countRadios(){
        var okRadios = document.querySelectorAll('input[type="radio"][value="OK"]');

        // count how many of them are checked
        var countOkRadios = 0;
        okRadios.forEach(function(radio) {
            if (radio.checked) {
                countOkRadios++;
            }
        });
        var resultElement = document.getElementById("result");
        resultElement.innerHTML = '<span style="color: greenyellow;">Score: </span>' + countOkRadios + '/11';
        document.getElementsByName("score").value = countOkRadios;


    }

    const nextBtn = document.getElementById('show-table2');
    nextBtn.addEventListener('click', () => {
        const currentTable = document.querySelector('.table-container:not([style*="none"])');
        const nextTable = currentTable.nextElementSibling;
        currentTable.style.display = 'none';
        nextTable.style.display = 'block';
    });
</script>
</body>
@endsection
