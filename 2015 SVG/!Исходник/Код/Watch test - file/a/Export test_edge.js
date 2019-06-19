/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "5.0.1",
                minimumCompatibleVersion: "5.0.0",
                build: "5.0.1.386",
                scaleToFit: "none",
                centerStage: "none",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'Hand_watch',
                            type: 'image',
                            rect: ['-1222px', '-322px', '1920px', '1080px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"Hand_watch.svg",'0px','0px']
                        },
                        {
                            id: 'pointer',
                            type: 'image',
                            rect: ['-1216px', '-326px', '1920px', '1080px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"pointer.svg",'0px','0px'],
                            transform: [[],['-30'],[],[],['46.3076%','44.3024%']]
                        },
                        {
                            id: 'big_pointer',
                            type: 'image',
                            rect: ['-1219px', '-322px', '1920px', '1080px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"big_pointer.svg",'0px','0px'],
                            transform: [[],['359'],[],[],['46.4805%','44.0102%']]
                        },
                        {
                            id: 'sec',
                            type: 'image',
                            rect: ['-1219px', '-322px', '1920px', '1080px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"sec.svg",'0px','0px'],
                            transform: [[],['701'],[],[],['46.456%','43.8363%']]
                        },
                        {
                            id: 'runningman',
                            type: 'image',
                            rect: ['-1219px', '-322px', '1920px', '1080px', 'auto', 'auto'],
                            opacity: '0',
                            fill: ["rgba(0,0,0,0)",im+"runningman.svg",'0px','0px'],
                            transform: [[],['-25'],[],[],['46.4553%','43.7494%']]
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: [undefined, undefined, '550px', '400px'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,1)"]
                        }
                    }
                },
                timeline: {
                    duration: 3000,
                    autoPlay: true,
                    data: [
                        [
                            "eid62",
                            "left",
                            0,
                            1000,
                            "easeOutQuad",
                            "${sec}",
                            '-1219px',
                            '-697px'
                        ],
                        [
                            "eid5",
                            "originY",
                            1000,
                            0,
                            "easeInQuad",
                            "${pointer}",
                            '44.3024%',
                            '44.3024%'
                        ],
                        [
                            "eid19",
                            "opacity",
                            2000,
                            1000,
                            "easeOutQuad",
                            "${runningman}",
                            '0',
                            '1'
                        ],
                        [
                            "eid42",
                            "left",
                            0,
                            1000,
                            "easeOutQuad",
                            "${Hand_watch}",
                            '-1222px',
                            '-697px'
                        ],
                        [
                            "eid7",
                            "top",
                            1000,
                            0,
                            "easeInQuad",
                            "${pointer}",
                            '-326px',
                            '-326px'
                        ],
                        [
                            "eid61",
                            "left",
                            0,
                            1000,
                            "easeOutQuad",
                            "${big_pointer}",
                            '-1219px',
                            '-697px'
                        ],
                        [
                            "eid39",
                            "top",
                            0,
                            0,
                            "easeInQuad",
                            "${Hand_watch}",
                            '-322px',
                            '-322px'
                        ],
                        [
                            "eid41",
                            "top",
                            1000,
                            0,
                            "easeInQuad",
                            "${Hand_watch}",
                            '-322px',
                            '-322px'
                        ],
                        [
                            "eid63",
                            "left",
                            0,
                            1000,
                            "easeOutQuad",
                            "${runningman}",
                            '-1219px',
                            '-697px'
                        ],
                        [
                            "eid17",
                            "rotateZ",
                            1000,
                            2000,
                            "easeOutQuad",
                            "${runningman}",
                            '-25deg',
                            '0deg'
                        ],
                        [
                            "eid13",
                            "rotateZ",
                            1000,
                            2000,
                            "easeOutQuad",
                            "${sec}",
                            '0deg',
                            '701deg'
                        ],
                        [
                            "eid10",
                            "rotateZ",
                            1000,
                            2000,
                            "easeInQuad",
                            "${pointer}",
                            '-30deg',
                            '0deg'
                        ],
                        [
                            "eid2",
                            "rotateZ",
                            1000,
                            2000,
                            "easeOutQuad",
                            "${big_pointer}",
                            '3deg',
                            '359deg'
                        ],
                        [
                            "eid4",
                            "originX",
                            1000,
                            0,
                            "easeInQuad",
                            "${pointer}",
                            '46.3076%',
                            '46.3076%'
                        ],
                        [
                            "eid60",
                            "left",
                            0,
                            1000,
                            "easeOutQuad",
                            "${pointer}",
                            '-1216px',
                            '-694px'
                        ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("Export%20test_edgeActions.js");
})("EDGE-1129105");
