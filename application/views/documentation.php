<!DOCTYPE html>

<html>
<head>
    <title>BitJitsu | <?php echo $pagetitle; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/bootstrap.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/Animate/animate.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/custom.css")?>">
    <script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/jquery-3.1.1.js")?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/bootstrap.js")?>"></script>
    <link href="https://markable.in/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://markable.in//static/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://markable.in/static/editor/css/view_file.css">
    <link rel="stylesheet" type="text/css" href="https://markable.in/static/css/code.css">
</head>
<body>
<div class="dochead">
    <h1>BitJitsu</h1>
    <hr align="center">
    <h3>Documentation</h3>
</div>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#gamerules" aria-controls="gamerules" role="tab" data-toggle="tab">Game Rules</a></li>
        <li role="presentation"><a href="#mechanics" aria-controls="mechanics" role="tab" data-toggle="tab">Game Mechanics</a></li>
        <li role="presentation"><a href="#diff" aria-controls="diff" role="tab" data-toggle="tab">Differences between Agar.io and Bitjitsu</a></li>
        <li role="presentation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="gamerules"><div class="container">
                <div id="content">
                    <h1 id="game-rules">Game Rules</h1>
                    <h2 id="overview">Overview</h2>
                    <p>This guide gives a detailed description of <strong>Bit-Jitsu</strong> game play.</p>
                    <h2 id="the-game">The Game</h2>
                    <ul>
                        <li>
                            <p>This game is inspired by <a href="https://agar.io/">agar.io</a>. We recommend that you
                                play this game, its available on Google Play Store, App Store(iOS) and on that link
                                above.</p>
                        </li>
                        <li>
                            <p>Initially you will start out in a random place on the map with a mass of 20 units.</p>
                        </li>
                        <li>
                            <p>You must be 80% bigger than anything that you wish to consume.</p>
                        </li>
                        <li>
                            <p>You can eat other blobs, you can eat viruses (the medium sized blue colored
                                circles), you can also eat food (the small red colored dots).</p>
                        </li>
                        <li>
                            <p>Split operation makes you to split yourself into two equal halves. One blob moves
                                in the direction that you are moving and the other blob will move in opposite
                                direction. Both the bots will move at a very high velocity. And Cover a distance
                                of <code>700 + Radius Units</code></p>
                        </li>
                        <li>
                            <p>You must have a minimum mass of 36 units before you can perform a split
                                operation.</p>
                        </li>
                        <li>
                            <p>There can only be 16 blobs of the same bot on a map.</p>
                        </li>
                        <li>
                            <p>You will split into two when you eat a virus if your total number of blobs is
                                less than 16. You will gain a mass of 70 units when you eat a virus. You will
                                also gain 210 points for eating a virus (Don't forget the 80% bigger rule, your
                                mass must be 130 for you to consume a virus).</p>
                        </li>
                        <li>
                            <p>Eating a food particle will give you an increase in mass by 2 units and fetch
                                you two points.</p>
                        </li>
                        <li>
                            <p>Eating a blob will result in a mass equivalent to the sum of your blob and the
                                blob that you ate. Eating a blob of your own won't increase points but if you
                                eat an opponent blob your points will rise by ten times the mass of the bot that
                                you ate.</p>
                        </li>
                        <li>
                            <p>Eject mass operation reduces your mass by two units and the food is ejected <code>50 + radius units</code>
                                away and in a direction opposite to motion of the blob.</p>
                        </li>
                        <li>
                            <p>Pause operation allows you to be stationary.</p>
                        </li>
                        <li>
                            <p>Blobs will experience a decay given by the formula: (0.002 * mass) units s<sup>-1</sup>,
                                thus its hard to maintain the mass. Greater the mass, greater the decay.</p>
                        </li>
                        <li>
                            <p>radius of anything = (mass / 2) units</p>
                        </li>
                        <li>
                            <p>Speed of a blob is given by the following formula: 2.2 * (mass <sup>-0.439</sup>) units s<sup>-1</sup></p>
                        </li>
                        <li>
                            <p>Number of viruses are fixed for a map. If a virus is eaten then it re-emerges imediately.</p>
                        </li>
                        <li>
                            <p>Map dimensions (16:9) 4992 X 2808 units <sup>2<sup></p>
                        </li>
                    </ul>
                </div>
            </div></div>
        <div role="tabpanel" class="tab-pane" id="mechanics"><div class="container">
                <div id="content">
                    <h1 id="game-mechanics">Game Mechanics</h1>
                    <ul>
                        <li>radius of anything = (mass / 2) units</li>
                        <li>decay of cell = (0.002 * mass) units s<sup>-1</sup></li>
                        <li>Minimum mass for split = 36 units</li>
                        <li>After split parent moves in opposite direction, child moves in the direction the parent was moving</li>
                        <li>After a split the mass of both the children are the same</li>
                        <li>Distance travelled after split with respect to both the radiuses = 700 + r units</li>
                        <li>mass of virus = 70 units</li>
                        <li>initial mass of cell = 20 units</li>
                        <li>Minimum mass for eating a virus = 130 units</li>
                        <li>Speed of a cell = 2.2 * (mass <sup>-0.439</sup>) units s<sup>-1</sup></li>
                        <li>Maximum children = 16</li>
                        <li>Number of viruses are fixed for a map. If a virus is eaten then it re-emerges imediately.</li>
                        <li>Map dimensions (16:9) = 4992 X 2808 units <sup>2<sup></li>
                        <li>Each food mass = 2 units</li>
                        <li>Each eject mass = 2 units</li>
                        <li>Mass eject happens in the direction opposite of motion</li>
                        <li>minimim mass of cell to eject mass = 20 units</li>
                        <li>condition for eating anything(food, virus, cells) = hunter must be 80% bigger than the prey</li>
                        <li>1 tick = 20 s</li>
                    </ul>
                    <p><strong>The origial is available <a href="http://agar.gcommer.com/index.php?title=Main_Page">here</a></strong></p>
                    <hr />
                    <p><a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/3.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.</p>
                </div>
            </div></div>
        <div role="tabpanel" class="tab-pane" id="diff"><div class="container">
                <div id="content">
                    <h1 id="difference-between-agario-and-bit-jitsu">Difference between agar.io and Bit-Jitsu</h1>
                    <ul>
                        <li>
                            <p>You can control each of the blobs <strong>independently</strong>.</p>
                        </li>
                        <li>
                            <p>You cannot hide under a virus.</p>
                        </li>
                        <li>
                            <p>You cannot feed a virus and spawn a new virus, feeding a virus does nothing.</p>
                        </li>
                        <li>
                            <p>The mass of the eject is exactly two units unlike <code>agar.io</code> where you loose
                                10% of your mass after an eject.</p>
                        </li>
                        <li>
                            <p>Unlike FFA mode (free for all) in agar.io, your game runs for fixed number of iterations
                                and all the bots start with equal initial mass.</p>
                        </li>
                        <li>
                            <p>agar.io has <code>14242 X 14242</code> square map but map of <code>Bit-Jitsu</code> is 16:9
                                <code>4992 X 2808</code>.</p>
                        </li>
                        <li>
                            <p>The split operation results in to equal halves unlike <code>agar.io</code>.</p>
                        </li>
                        <li>
                            <p>You can merge your blobs when ever you want unlike <code>agar.io</code> where there is
                                a minimum time before you can merge your bots.</p>
                        </li>
                        <li>
                            <p>You will not split into multiple blobs after eating a virus given that the number
                                of blobs is less than 16 like you do in agar.io, instead you will split into two if
                                the number of blobs for your bot is less than 16.</p>
                        </li>
                        <li>
                            <p>The eject mass operation happens in a direction opposite of current direction
                                unlike <code>agar.io</code></p>
                        </li>
                    </ul>
                    <hr />
                    <p><a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/3.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.</p>
                </div>
            </div></div>

        <div role="tabpanel" class="tab-pane" id="tutorial"><div class="container">
                <div id="content">
                    <h1 id="writing-a-bot-in-python">Writing a bot (in Python)</h1>
                    <p>You can technically write a bot in any language, but we only have
                        Python2 API ready. We'll go through the entire code step by step.</p>
                    <h2 id="prerequisites">Prerequisites</h2>
                    <ul>
                        <li>You should have read the <code>gameRules.md</code> and <code>diff-agario-bitjitsu.md</code></li>
                        <li>You should know Python.</li>
                    </ul>
                    <h2 id="explanation">Explanation</h2>
                    <p>The basic bot comes in a nice structure.</p>
                    <pre><code>python2/
└── src
    ├── botapi.py
    ├── __init__.py
    └── __main__.py

1 directory, 3 files

</code></pre>

                    <p>The bot starts its execution in <code>__main__.py</code>. The first line imports a <code>game</code>
                        class from <code>botapi.py</code>. The next line we just import the good old <code>sys</code> module
                        (it is a builtin module). Then, we print <code>I'm Poppy!</code> (with a newline
                        character at the end). Every bot has to do this as its first move for the
                        engine to acknowledge the bot. Then in an infinite loop, we get the input with
                        <code>raw_input()</code> this is a <code>JSON</code> object of the current state. You don't have to
                        worry what that is, all you have to do is create an object of class <code>game</code> with
                        the paramater to its constructor as the name of the bot that you gave when you
                        submitted and a string that you got from <code>STDIN</code>. You must have noticed that
                        we are doing an explicit <code>flush</code>  after each <code>print</code> statement this is because
                        only when you flush the buffer, the engine gets to know that you have made a
                        move. If you are wondering what is happening here and are asking <em>"Doesn't
                            python flush its buffer automatically?"</em>, normally it does, but we have set the
                        size of the pipe buffer to a bigger size (yes we use PIPEs for our IPC), so that
                        the buffer is big enough for all your sixteen blobs (if you create 16 blobs by
                        split or eating a virus) to make its move.</p>
                    <p>Now lets take a look at what is available to us. The only thing that is available
                        to us is the <code>botapi.py</code>. Make sure that you use the name that you submitted to
                        server and the name that you are using are the same ones (even the case).
                        Otherwise you bot will just fail.</p>
                    <h2 id="the-list-of-queries-that-you-can-make-about-the-current-game-state">The list of queries that you can make about the current <code>Game-State</code></h2>
                    <ul>
                        <li><code>game.get_children()</code> returns a list of <code>dict</code>s of the following fields of
                            all of your blobs that your bot owns.</li>
                    </ul>
                    <pre><code>{
    'botname':'kevin',
    'childno':0,
    'center':[x, y],
    'mass':20,
    'angle':0,
    'radius':10
}
</code></pre>

                    <ul>
                        <li>
                            <p><code>game.get_bots()</code> returns a list of <code>dict</code>s of all the blobs that are not
                                yours of the same format as mentioned above.</p>
                        </li>
                        <li>
                            <p><code>game.get_foods()</code> returns a list of tuples containing coordinates of all
                                the foods.</p>
                        </li>
                        <li>
                            <p><code>game.get_viruses()</code> returns a list of tuples containing coordinates of all
                                the viruses</p>
                        </li>
                    </ul>
                    <h2 id="list-of-methods-that-you-can-make-on-your-blobs">List of methods that you can make on your blobs</h2>
                    <p>Each blob has a unique number and this number this is identified by <code>childno</code>.</p>
                    <ul>
                        <li>
                            <p><code>game.change_direction(childno, relative_angle)</code> here the relative angle is
                                in degrees (it can only take values between 0 and 359). The <code>childno</code> is the
                                unique number given to the blob, you can only make these queries on your bot!</p>
                        </li>
                        <li>
                            <p><code>game.eject_mass(childno)</code> this makes the particular blob to loose its mass,
                                its further explained in <code>gameRules.md</code></p>
                        </li>
                        <li>
                            <p><code>game.split(childno)</code> this makes the particular blob to perform the <code>split</code>
                                operation.</p>
                        </li>
                        <li>
                            <p><code>game.pause(childno)</code> this makes the particular blob to perform the pause
                                operation.</p>
                        </li>
                    </ul>
                    <h2 id="finally">Finally,</h2>
                    <ul>
                        <li>**<code>game.make_move()</code> this generates a <code>JSON</code> string of the move of all the
                            blobs. You print this to <code>STDOUT</code> and flush the buffer.</li>
                    </ul>
                    <h3 id="note">Note:</h3>
                    <ul>
                        <li>It is advised that you do not modify <code>botapi.py</code>, but you can do what ever
                            you want if you know what you are doing.</li>
                    </ul>
                    <hr />
                    <p><a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/3.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.</p>
                </div>
            </div></div>

    </div>

</div>