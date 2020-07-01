<?php

$manifest = "";
$collection = "";
if (isset($_GET["manifest"])) {
  $manifest = $_GET["manifest"];
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
    var collection = "<?php echo $collection ?>";
    var manifestdata = {manifestType: manifest};
    var type, uri, openManifestsPage;

    var preload = document.getElementById("preload");
    var user = document.getElementById("user");

    if (manifest != "") {
        type = {manifestUri: manifest, location: 'University Leiden Library'}
        uri = manifest;
        openManifestsPage = false;
    }
    if (collection != "") {

        //user.style.display = "none";
        type = {collectionUri: collection, location: 'University Leiden Library'}
        uri = collection;
        openManifestsPage = true;
    }


    if (manifest != "")
        LoadManifestMirador(type, uri, openManifestsPage);
    else if (collection != "")
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
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:29758/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:29759/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:29760/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53835/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16557/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16564/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16576/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16551/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:13085/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16641/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16644/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16669/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16608/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16610/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16580/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16687/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16692/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16679/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27506/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27507/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27509/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27532/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27533/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27536/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27519/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27522/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27523/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:29756/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:27535/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53915/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53912/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53910/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53911/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53914/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53918/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53916/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53917/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53993/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53994/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53995/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53913/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:17073/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:13102/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53402/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53415/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53409/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53520/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53473/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53559/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53502/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53505/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53781/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53541/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53545/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53571/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53493/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53496/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53509/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53512/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53515/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53462/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53816/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16700/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53399/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:26699/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:16869/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:26491/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:17146/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53711/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53706/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53703/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53728/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53716/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53719/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53725/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53722/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53889/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53892/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53895/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53879/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53884/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53861/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:17145/manifest' , location: 'University Leiden'},
                { manifestUri:'https://scharrelaar-a3.leidenuniv.nl/iiif_manifest/item:53862/manifest' , location: 'University Leiden'},

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

    function LoadManifestMirador(type, uri, openManifestsPage) {

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