<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style>
            body{
                background-color: gray; /* For browsers that do not support gradients */
                background-image: linear-gradient(to right, gray, #174617); 
                font-family: inherit;
            }

            .main_container{
                margin-top: 50px;
                background-color: #e1f3e0;
                min-height: 400px;
                border-radius: 48px;
            }

            .panel-heading{
                background-color: #174617;
                color: white;
                padding: 0 3px;
            }
            .panel-body{
                padding: 0 4px;
            }
            .btn{
                margin: 0 20px;
                float: right !important;
            }
            .modal-footer{
                text-align: center !important;
            }
            h1{
                color: #174617;
                font-family: fantasy;
                font-size: xx-large;
                margin-bottom: 60px;
            }

            .fade.in {
                font-size: small;
                padding: 10px;
            }
            .btn_panel{
                float: right;
            }


            /*small devices (mobiles, 320px and up)*/
            @media (min-width: 320px) and (max-width: 767px) {
                .main_container{
                    margin: 20px;
                }
                .btn{
                    margin: 0 10px;
                }
                .div_entrance{
                    padding: 0;
                }
                .btn_panel{
                    float: none;
                }
            }
        </style>
        <title>Write down vocabulary</title>
    </head>
    <body>
        <div class="container main_container">
            <div><h1 class="text-center">Write down vocabulary/h1></div>

            <div class="col-sm-6 text-center " style="margin-bottom: 30px;">
                <a href="#" title="Add new entrance" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-plus" ><strong> New entrance</strong></span>
                </a>
            </div>
            <div class="clearfix"></div>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add new entrance to the dictionary</h4>
                        </div>
                        <div class="modal-body">
                            <div id="div_add" class="form-group">
                                <input class=" form-control" type="text" id="id_word" placeholder="New entrance"  spellcheck="true">
                                <label>Meaning</label>
                                <textarea class=" form-control" type="text" id="id_meaning"  spellcheck="true" >
                                </textarea>
                                <label>Examples</label>
                                <textarea class=" form-control" type="text" id="id_examples"  spellcheck="true">
                                </textarea>
                                <label>Synonyms</label>
                                <textarea class=" form-control" type="text" id="id_synonyms" spellcheck="true">
                                </textarea>
                            </div>
                            <div class="modal-footer">
                                <button id="btn_add" class="btn btn-success btn-sm" onclick="addEntrance();">Add</button>
                                <button id="btn_clear"  class="btn btn-warning btn-sm"  onclick="clearEntrance();">Clear</button>
                                <button data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button>                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal-->
        </div>
    </body>
</html>

<script>

    var vocabulary = [];
    var text = "";
    var i = 1;

    /**
     * Clear an show value for each button meaning, button synonyms, button example, ...,
     * @param {type} value, data to insert
     * @param {type} i, item position
     * @returns {undefined}
     */
    function setPanel(value, i) {
        $('#div_content_' + i).empty();
        $('#div_content_' + i).append(value);
        $('#div_content_' + i).addClass("active in");
    }

    /**reset the new entrance before insert*/
    function clearEntrance() {
        $('#id_word').val('');
        $('#id_meaning').val('');
        $('#id_examples').val('');
        $('#id_synonyms').val('');
    }

    /**Add new entrance to the vocabulary using an object with 4 propieties: word, meaning, examples and synonyms*/
    function addEntrance() {
        var word = $('#id_word').val();
        var meaning = $('#id_meaning').val();
        if (!word) {
            alert("New entry must be filled");
            $('#id_word').css("border-color", "red");
            $('#id_word').focus();
            return false;
        }
        if (!meaning) {
            alert("The meaning must be filled");
            $('#id_meaning').css("border-color", "red");
            $('#id_meaning').focus();
            return false;
        }
        var my_entrance = {
            word: $('#id_word').val(),
            meaning: $('#id_meaning').val(),
            examples: $('#id_examples').val(),
            synonyms: $('#id_synonyms').val()
        };

        $('#myModal').modal('toggle');

        text = "<div class='col-sm-6 div_entrance'> <div class='panel'><div class='panel-heading nav nav-tabs'>";
        text += "<div style='padding: 8px'>" + my_entrance.word + " </div>";
        text += "<div class='btn_panel'>";

        text += "<button type='button' class='btn btn-xs btn-info' data-toggle='tab' href='#div_content_" + i + "' onclick='javascript:setPanel(\"" + my_entrance.meaning + "\", \"" + i + "\");'>Meaning</button>";
        text += "<button type='button' class='btn btn-xs btn-warning' data-toggle='tab' href='#div_content_" + i + "' onclick='javascript:setPanel(\"" + my_entrance.synonyms + "\", \"" + i + "\");'>Synonyms</button>";
        text += "<button type='button' class='btn btn-xs btn-success' data-toggle='tab' href='#div_content_" + i + "' onclick='javascript:setPanel(\"" + my_entrance.examples + "\", \"" + i + "\");'>Examples</button>";
        text += "</div></div>";
        text += "<div id='div_content_" + i + "' class='tab-pane fade'> </div>";
        text += "</div></div>";
        $('.container').append(text);

        clearEntrance();
        i += 1;
    }


</script>