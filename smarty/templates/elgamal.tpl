<div>
    <div id="elGamalContainer">
        <div id="cypherContainer">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Cypher</span>
                <input id="textToCypher" type="text" class="form-control" placeholder="Text To Cypher" aria-describedby="sizing-addon1">
                <textarea class="form-control" id="cypherText" disabled="disabled" placeholder="Cypher Text"></textarea>
            </div>
            <br>
        </div>
        <div id="decypherContainer">
            <div>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon" id="sizing-addon1">Decypher</span>
                    <textarea class="form-control" id="decypherText" disabled="disabled" placeholder="Decypher Text"></textarea>
                </div>
            </div>
        </div>
        <br>
        <div id="BSGSContainer">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">BSGS</span>
                <input type="text" class="form-control" data-toggle="popover" aria-describedby="sizing-addon1" id="aExponent" placeholder="Expontent A" />
                <textarea class="form-control" data-toggle="popover" id="BSGSText" placeholder="Decypher Text"></textarea>
            </div>
        </div>
        <br>
        <div class="col-sm-offset-0 col-sm-3 text-center">
            <div id="buttonContainer" class="btn-group btn-group-lg" role="group" aria-label="...">
                <button id="cypherButton" type="button" class="btn btn-default">Cypher!!!</button>
                <button id="BSGSButton" type="button" class="btn btn-default">BSGS Attack</button>
                <button id="clearButton" type="button" class="btn btn-default">Clear</button>
            </div>
        </div>
    </div>
    <div id="loadingContainer">
        <img id="loading" src="./CSS/img/gears.svg">
    </div>
</div>

