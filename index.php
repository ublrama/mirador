<?php

header('Set-Cookie: same-site-cookie=foo; SameSite=Lax', false);
header('Set-Cookie: cross-site-cookie=bar; SameSite=None; Secure', true);

$manifest = "";
$canvasID = "";
$collection = "";
if (isset($_GET["manifest"])) {
  $manifest = $_GET["manifest"];
}
if (isset($_GET["canvasID"])) {
  $canvasID = $_GET["canvasID"];
}


if (isset($_GET["collection"])) {
  $collection = $_GET["collection"];
  $manifest = "";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="mirador/css/mirador-combined.css">
    <title>Mirador Viewer</title>
    <style type="text/css">
        #viewer {
            width: 100%;
            height: 100%;
            position: fixed;
        }
    </style>
</head>
<body>
<div id="viewer"></div>

<script src="mirador/mirador.min.js"></script>
<script type="text/javascript">

    var manifest = "<?php echo $manifest ?>";
    var canvasID = "<?php echo $canvasID ?>";
    var collection = "<?php echo $collection ?>";
    var manifestdata = {manifestType: manifest};
    var type, uri, openManifestsPage;

    var preload = document.getElementById("preload");
    var user = document.getElementById("user");

    if (manifest !== "") {
        type = {manifestUri: manifest, location: 'University Leiden Library'}
        uri = manifest;
        openManifestsPage = false;
    }

    if (collection !== "") {

        //user.style.display = "none";
        type = {collectionUri: collection, location: 'University Leiden Library'}
        uri = collection;
        openManifestsPage = true;
    }


    if (manifest !=="")
        LoadManifestMirador(type, uri, openManifestsPage,canvasID);
    else if (collection !== "")
        LoadMCollectionMirador(type, uri, openManifestsPage);
    else
        LoadDefaultMirador();

    function LoadDefaultMirador() {
        myMiradorInstance = Mirador({
            id: "viewer",
            layout: "1x1",
            buildPath: "mirador/",
            preserveManifestOrder: true,
            data: [
                { manifestUri:'https://localhost/iiif/?manifest=caribbean' , location: 'Local'},
                //{ manifestUri:'http://localhost:8000//iiif_manifest/islandora:9/manifest' , location: 'Islandora'},

            ],
            manifestsPanel: {
                name: "Collection tree browser",
                module: "CollectionTreeManifestsPanel"
            },
            openManifestsPage: true,
            /*annotationEndpoint: {
              name:"Local Storage",
              module: "LocalStorageEndpoint" 
            },*/
            "windowSettings": {
                "canvasControls": { // The types of controls available to be displayed on a canvas
                    "annotations": {
                        "annotationLayer": false, //whether or not to make annotation layer available in this window
                        "annotationCreation": false, /*whether or not to make annotation creation available in this window,
                       only valid if annotationLayer is set to True and an annotationEndpoint is defined.
                       This setting does NOT affect whether or not a user can edit an individual annotation that has already been created.*/
                        "annotationState": 'off', //[_'off'_, 'on'] whether or not to turn on the annotation layer on window load
                        "annotationRefresh": false, //whether or not to display the refresh icon for annotations
                    },
                    "imageManipulation": {
                        "manipulationLayer": true,
                        "controls": {
                            "mirror": true
                        }
                    }
                }
            }/*,"sidePanelOptions" : {
         "tocTabAvailable": false,
         "layersTabAvailable": false,
         "searchTabAvailable": false
       }*/
        });
    }

    function LoadManifestMirador(type, uri, openManifestsPage,canvasID) {

        myMiradorInstance = Mirador({
            id: "viewer",
            layout: "1x1",
            buildPath: "mirador/",
            data: [
                type
            ],
            manifestsPanel: {
                name: "Manifest",
                module: "ManifestsPanel"
            },
            openManifestsPage: openManifestsPage,
            showAddFromURLBox: false,
            windowObjects: [{
                sidePanel: false,
                loadedManifest: uri,
                canvasID : canvasID,
                annotationLayer: false
            }],
            /*annotationEndpoint: {
              name:"Local Storage",
              module: "LocalStorageEndpoint" },*/
            "windowSettings": {
                "canvasControls": { // The types of controls available to be displayed on a canvas
                    "imageManipulation": {
                        "manipulationLayer": true,
                        "controls": {
                            "mirror": true
                        }
                    }
                }
            }/*,"sidePanelOptions" : {
           "tocTabAvailable": false,
           "layersTabAvailable": false,
           "searchTabAvailable": false
         }*/
        });
    }

    function LoadMCollectionMirador(type, uri, openManifestsPage) {

        myMiradorInstance = Mirador({
            id: "viewer",
            layout: "1x1",
            buildPath: "mirador/",
            data: [
                type
            ],
            manifestsPanel: {
                name: "Collection tree browser",
                module: "CollectionTreeManifestsPanel"
            },
            openManifestsPage: openManifestsPage,
            showAddFromURLBox: false,

            /*annotationEndpoint: {
              name:"Local Storage",
              module: "LocalStorageEndpoint" },*/
            "windowSettings": {
                "canvasControls": { // The types of controls available to be displayed on a canvas
                    "imageManipulation": {
                        "manipulationLayer": true,
                        "controls": {
                            "mirror": true
                        }
                    }
                }
            }/*,"sidePanelOptions" : {
           "tocTabAvailable": false,
           "layersTabAvailable": false,
           "searchTabAvailable": false
         }*/
        });

    }


</script>
</body>
</html>