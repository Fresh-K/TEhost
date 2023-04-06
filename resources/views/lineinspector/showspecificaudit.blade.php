@extends('layouts.lineinspector')

@section('content')

    <div class="container-fluid">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> New Audit</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form method="post" action="{{route('audit-add')}}">
                            @csrf
                            {{--                            <div class="form-row">--}}
                            {{--                                <label class="col-form-label col-sm-3 pt-0">Machine: </label>--}}
                            {{--                                <div class="form-group mb-0">--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-1"> CC64-1</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-2"> CC64-2</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-3"> CC64-3</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-4"> CC64-4</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-5"> CC64-5</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-6"> CC64-6</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-7"> CC64-7</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-8"> CC64-8</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-9"> CC64-9</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-10"> CC64-10</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-11"> CC64-11</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="KOMAX"> KOMAX</label>--}}
                            {{--                                </div>--}}


                            {{--                                <label class="col-form-label col-sm-3 pt-0">SHIFT : </label>--}}
                            {{--                                <div class="form-group mb-0">--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-10"> CC64-10</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-11"> CC64-11</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="KOMAX"> KOMAX</label>--}}
                            {{--                                </div>--}}
                            {{--                                --}}
                            {{--                                <label class="col-form-label col-sm-3 pt-0">Maintenace 1er niveau </label>--}}
                            {{--                                <div class="form-group mb-0">--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-10"> OK</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-11"> N/A</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="KOMAX"> NC/C</label>--}}
                            {{--                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="KOMAX"> NC</label>--}}
                            {{--                                </div>--}}


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                        <thead class="thead-primary">
                                        <tr>

                                            <th scope="col">MACHINE</th>
                                            <th scope="col">SHIFT</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>

                                            <td> <div class="form-group mb-0">
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-1"> CC64-1</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-2"> CC64-2</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-3"> CC64-3</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-4"> CC64-4</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-5"> CC64-5</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-6"> CC64-6</label><br>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-7"> CC64-7</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-8"> CC64-8</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-9"> CC64-9</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-10"> CC64-10</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="CC64-11"> CC64-11</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="machine" value="KOMAX"> KOMAX</label>
                                                </div></td>
                                            <td><div class="form-group mb-0">
                                                    <label class="radio-inline mr-3"><input type="radio" name="shift" value="M">M</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="shift" value="S">S</label>
                                                    <label class="radio-inline mr-3"><input type="radio" name="shift" value="N">N</label>
                                                </div></td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                        <tr>
                                            <th>N</th>
                                            <th>Type</th>
                                            <th>Points a Verifier</th>
                                            <th>Frequence</th>
                                            <th>Actions</th>
                                            <th>Status</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>1</td>
                                            <th>Maintenace 1er niveau</th>
                                            <td>Vérifier la disponibilité et le remplissage du Checklist de Maintenance 1er niveau </td>
                                            <td>Chaque début shift
                                            </td>
                                            <td>Corriger l'anomalie immédiatement</td>
                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q1" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q1" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q1" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q1" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <th>Accesoire Machine</th>
                                            <td>Vérifier la disponibilité et le fonctionnement des : (Gripper,Vacuum machin,impriment Scanner) </td>
                                            <td>  3 fois par shift</td>
                                            <td rowspan="3">1- Arrêter le processus </br> 2- Refuser la production si nécessaire </br> 3- Corriger le processus</td>
                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q2" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio"  oninput="countRadios()" name="q2" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q2" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q2" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <th>Enfilment</th>
                                            <td>Vérifier l'équipement de l'enfilement : disque de protection terminaux, roues de redressement, courroie d'entrainement, détecteur fin rouleaux, protection de bobine</td>
                                            <td>Chaque début shift</td>

                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q3" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" name="q3" oninput="countRadios()" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" name="q3" oninput="countRadios()" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio" name="q3" oninput="countRadios()" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <th>Bloc des Lames</th>
                                            <td>Vérifier visuellemnt la conformité et l'état des lames </td>
                                            <td>3 fois par shift</td>

                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q4" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q4" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio"oninput="countRadios()"  name="q4" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio"oninput="countRadios()"  name="q4" value="NC"> NC</label></td>


                                        </tr>
                                        <br>
                                        <td>5</td>
                                        <th>Moyen de mesure et de controle</th>
                                        <td>Vérifier l'état, le fonctionnement et la calibration du :</br>
                                            - Comparateur</br>
                                            - Dynamomètre (Machine de traction)</br>
                                            - Règle ou ruban métrique </td>
                                        <td>Chaque début shift</td>
                                        <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>
                                        <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q5" value="OK"> OK</label>
                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q5" value="N/A"> N/A</label>
                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q5" value="NC/C"> NC/C</label>
                                            <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q5" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <th>Controle de produit non conforme</th>
                                            <td>Est-ce que le Produit non conforme est identifié et contrôlé conformément à la procédure de produit non conforme?</td>
                                            <td>3 fois par shift</td>
                                            <td>1 - Refus du produit si nécessaire</br> 2 - Analyse</br> 3 - Correction Etiquette d'identification</td>
                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q6" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q6" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q6" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio"  oninput="countRadios()" name="q6" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <th>Etiquette d'identification</th>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q7" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q7" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q7" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q7" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <th>Documentations/Aide Visuelle</th>
                                            <td>Vérifier la présence et le bon remplissage de l'ensembles des documents : (carte de contrôle,SWI,QIP ,Aide Visuelle) </td>
                                            <td>Chaque début shift </td>
                                            <td>Corriger l'anomalie (Délai tolérable avec un plan) </td>
                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q8" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q8" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q8" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q8" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <th>5S</th>
                                            <td>Vérifier l'ordre et la propreté des Machines </td>
                                            <td>3 fois par shift </td>
                                            <td>Corriger l'anomalie immédiatement </td>
                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q9" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q9" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q9" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q9" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <th>Stockage</th>
                                            <td>Vérifier si la zone de stockage ne présente aucun risque sur le produit Vérifier que tout les terminaux sont protéger avec des protection plastic </td>
                                            <td>3 fois par shift</td>
                                            <td>Corriger l'anomalie immédiatement</td>
                                            <td> <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q10" value="OK"> OK</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q10" value="N/A"> N/A</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q10" value="NC/C"> NC/C</label>
                                                <label class="radio-inline mr-3"><input type="radio" oninput="countRadios()" name="q10" value="NC"> NC</label></td>


                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <th>Parametres</th>
                                            <td>Vérifier le bon fonctionnement du DATA-Loading

                                            </td>
                                            <td>Chaque début shift
                                            </td>
                                            <td> 1- Arrêter le processus </br>2- Refuser la production</br> 3- Corriger le processus</td>
                                            <td> </td>
                                        </tr>
                                        </tbody>




                                    </table>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
