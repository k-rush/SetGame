<!DOCTYPE html>
<!-- This is the main display page for the set game.
    Kyle Rush
    HW 6
-->
<html>
    <head>
        <title>Set Game</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>        
        <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
        <script type="text/javascript" src="js.js"></script>
        <link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.23.custom.css" />
        <link rel="stylesheet" type="text/css" href="js/style.css"
    </head>
    <body>
        <div id="progressbar"></div>
        <h1>Welcome to Set, Person.</h1>
        <div id="container">
        <div id="imageDiv">
            <table id="imgTable">
                <tr>
                    <td></td><td></td><td></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td>
                </tr>
                <tr>
                    <td></td><td></td><td></td>
                </tr>
            </table>
        </div>
        <div id="control">
            <table id="controls">
                <thead>Commands</thead>
                <tr>
                    <td>
                        <button>Set</button>
                    </td>
                    <td>
                        <button>Add Row</button>
                    </td>
                    <td>
                        <button>Shuffle</button>
                    </td>
                    <td>
                        <button>End Game</button>
                    </td>
                </tr>
            </table>
        </div>
            <div id="score">
                <table id ="scoreboard">
                    <thead> <h2>Players</h2> </thead>
                    <tr>
                        <td>Name</td>
                        <td>Score</td>
                        <td>R</td>
                        <td>S</td>
                        <td>E</td>
                    </tr>
                    <tr>
                        <td>Albert</td>
                        <td>0</td>
                        <td>false</td>
                        <td>false</td>
                        <td>false</td>
                    </tr>
                    <tr>
                        <td>null</td>
                        <td>0</td>
                        <td>false</td>
                        <td>false</td>
                        <td>false</td>
                    </tr>
                    <tr>
                        <td>Charles</td>
                        <td>0</td>
                        <td>false</td>
                        <td>false</td>
                        <td>false</td>
                    </tr>
                    <tr>
                        <td>Kyle</td>
                        <td>0</td>
                        <td>false</td>
                        <td>false</td>
                        <td>false</td>
                    </tr>
                </table>
            </div>
        </div>
        </div>
        
    </body>
</html>
