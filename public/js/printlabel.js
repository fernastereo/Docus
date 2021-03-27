//----------------------------------------------------------------------------
//
//  $Id: PrintLabel.js 38773 2015-09-17 11:45:41Z nmikalko $ 
//
// Project -------------------------------------------------------------------
//
//  DYMO Label Framework
//
// Content -------------------------------------------------------------------
//
//  DYMO Label Framework JavaScript Library Samples: Print label
//
//----------------------------------------------------------------------------
//
//  Copyright (c), 2010, Sanford, L.P. All Rights Reserved.
//
//----------------------------------------------------------------------------


(function()
{
    // called when the document completly loaded
    function onload()
    {
        var company = document.getElementById('company');
        var codeDocument = document.getElementById('codedocument');
        var daterec = document.getElementById('daterec');
        var subject = document.getElementById('subject');
        var sender = document.getElementById('sender');
        var pages = document.getElementById('pages');
        var copies = document.getElementById('copies');
        var printButton = document.getElementById('printButton');

        // prints the label
        printButton.onclick = function()
        {
            try
            {
                // open label
                var labelXml = '<?xml version="1.0" encoding="utf-8"?>\
<DieCutLabel Version="8.0" Units="twips">\
    <PaperOrientation>Landscape</PaperOrientation>\
    <Id>Address</Id>\
    <IsOutlined>false</IsOutlined>\
    <PaperName>30252 Address</PaperName>\
    <DrawCommands>\
        <RoundRectangle X="0" Y="0" Width="1581" Height="5040" Rx="270" Ry="270" />\
    </DrawCommands>\
    <ObjectInfo>\
        <BarcodeObject>\
            <Name>cbarras</Name>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />\
            <BackColor Alpha="0" Red="255" Green="255" Blue="255" />\
            <LinkedObjectName />\
            <Rotation>Rotation0</Rotation>\
            <IsMirrored>False</IsMirrored>\
            <IsVariable>False</IsVariable>\
            <GroupID>-1</GroupID>\
            <IsOutlined>False</IsOutlined>\
            <Text>CU120180625-0013</Text>\
            <Type>Code128Auto</Type>\
            <Size>Small</Size>\
            <TextPosition>Bottom</TextPosition>\
            <TextFont Family="Arial" Size="10" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
            <CheckSumFont Family="Arial" Size="8" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
            <TextEmbedding>None</TextEmbedding>\
            <ECLevel>0</ECLevel>\
            <HorizontalAlignment>Center</HorizontalAlignment>\
            <QuietZonesPadding Left="0" Top="0" Right="0" Bottom="0" />\
        </BarcodeObject>\
        <Bounds X="2139.37209302325" Y="114.418604651163" Width="2779.62790697674" Height="747.906976744186" />\
    </ObjectInfo>\
    <ObjectInfo>\
        <TextObject>\
            <Name>asunto</Name>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />\
            <BackColor Alpha="0" Red="255" Green="255" Blue="255" />\
            <LinkedObjectName />\
            <Rotation>Rotation0</Rotation>\
            <IsMirrored>False</IsMirrored>\
            <IsVariable>False</IsVariable>\
            <GroupID>-1</GroupID>\
            <IsOutlined>False</IsOutlined>\
            <HorizontalAlignment>Left</HorizontalAlignment>\
            <VerticalAlignment>Top</VerticalAlignment>\
            <TextFitMode>AlwaysFit</TextFitMode>\
            <UseFullFontHeight>True</UseFullFontHeight>\
            <Verticalized>False</Verticalized>\
            <StyledText>\
                <Element>\
                    <String xml:space="preserve">ASUNTO: DERECHO DE PETICION</String>\
                    <Attributes>\
                        <Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />\
                    </Attributes>\
                </Element>\
            </StyledText>\
        </TextObject>\
        <Bounds X="331" Y="977.418604651162" Width="3229.18604651163" Height="165" />\
    </ObjectInfo>\
    <ObjectInfo>\
        <TextObject>\
            <Name>remitente</Name>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />\
            <BackColor Alpha="0" Red="255" Green="255" Blue="255" />\
            <LinkedObjectName />\
            <Rotation>Rotation0</Rotation>\
            <IsMirrored>False</IsMirrored>\
            <IsVariable>False</IsVariable>\
            <GroupID>-1</GroupID>\
            <IsOutlined>False</IsOutlined>\
            <HorizontalAlignment>Left</HorizontalAlignment>\
            <VerticalAlignment>Top</VerticalAlignment>\
            <TextFitMode>AlwaysFit</TextFitMode>\
            <UseFullFontHeight>True</UseFullFontHeight>\
            <Verticalized>False</Verticalized>\
            <StyledText>\
                <Element>\
                    <String xml:space="preserve">REMITENTE: FERNANDO ENRIQUE CUETO RIVERA</String>\
                    <Attributes>\
                        <Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />\
                    </Attributes>\
                </Element>\
            </StyledText>\
        </TextObject>\
        <Bounds X="331" Y="1223.6976744186" Width="4381.39534883721" Height="161.860465116279" />\
    </ObjectInfo>\
    <ObjectInfo>\
        <TextObject>\
            <Name>folios</Name>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />\
            <BackColor Alpha="0" Red="255" Green="255" Blue="255" />\
            <LinkedObjectName />\
            <Rotation>Rotation0</Rotation>\
            <IsMirrored>False</IsMirrored>\
            <IsVariable>False</IsVariable>\
            <GroupID>-1</GroupID>\
            <IsOutlined>False</IsOutlined>\
            <HorizontalAlignment>Right</HorizontalAlignment>\
            <VerticalAlignment>Top</VerticalAlignment>\
            <TextFitMode>AlwaysFit</TextFitMode>\
            <UseFullFontHeight>True</UseFullFontHeight>\
            <Verticalized>False</Verticalized>\
            <StyledText>\
                <Element>\
                    <String xml:space="preserve">FOLIOS: 100</String>\
                    <Attributes>\
                        <Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />\
                    </Attributes>\
                </Element>\
            </StyledText>\
        </TextObject>\
        <Bounds X="3498.09302325581" Y="979.860465116279" Width="1231.04651162791" Height="165" />\
    </ObjectInfo>\
    <ObjectInfo>\
        <TextObject>\
            <Name>fecha</Name>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />\
            <BackColor Alpha="0" Red="255" Green="255" Blue="255" />\
            <LinkedObjectName />\
            <Rotation>Rotation0</Rotation>\
            <IsMirrored>False</IsMirrored>\
            <IsVariable>False</IsVariable>\
            <GroupID>-1</GroupID>\
            <IsOutlined>False</IsOutlined>\
            <HorizontalAlignment>Center</HorizontalAlignment>\
            <VerticalAlignment>Top</VerticalAlignment>\
            <TextFitMode>AlwaysFit</TextFitMode>\
            <UseFullFontHeight>True</UseFullFontHeight>\
            <Verticalized>False</Verticalized>\
            <StyledText>\
                <Element>\
                    <String xml:space="preserve">25-08-2018</String>\
                    <Attributes>\
                        <Font Family="Arial" Size="14" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />\
                    </Attributes>\
                </Element>\
            </StyledText>\
        </TextObject>\
        <Bounds X="421" Y="153.46511627907" Width="1610.58139534884" Height="215.232558139535" />\
    </ObjectInfo>\
    <ObjectInfo>\
        <TextObject>\
            <Name>asunto_3</Name>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />\
            <BackColor Alpha="0" Red="255" Green="255" Blue="255" />\
            <LinkedObjectName />\
            <Rotation>Rotation0</Rotation>\
            <IsMirrored>False</IsMirrored>\
            <IsVariable>False</IsVariable>\
            <GroupID>-1</GroupID>\
            <IsOutlined>False</IsOutlined>\
            <HorizontalAlignment>Center</HorizontalAlignment>\
            <VerticalAlignment>Top</VerticalAlignment>\
            <TextFitMode>AlwaysFit</TextFitMode>\
            <UseFullFontHeight>True</UseFullFontHeight>\
            <Verticalized>False</Verticalized>\
            <StyledText>\
                <Element>\
                    <String xml:space="preserve">CURADURIA URBANA N° 1</String>\
                    <Attributes>\
                        <Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />\
                    </Attributes>\
                </Element>\
            </StyledText>\
        </TextObject>\
        <Bounds X="331" Y="471.604651162791" Width="1850.58139534884" Height="165" />\
    </ObjectInfo>\
    <ObjectInfo>\
        <TextObject>\
            <Name>asunto_4</Name>\
            <ForeColor Alpha="255" Red="0" Green="0" Blue="0" />\
            <BackColor Alpha="0" Red="255" Green="255" Blue="255" />\
            <LinkedObjectName />\
            <Rotation>Rotation0</Rotation>\
            <IsMirrored>False</IsMirrored>\
            <IsVariable>False</IsVariable>\
            <GroupID>-1</GroupID>\
            <IsOutlined>False</IsOutlined>\
            <HorizontalAlignment>Center</HorizontalAlignment>\
            <VerticalAlignment>Top</VerticalAlignment>\
            <TextFitMode>AlwaysFit</TextFitMode>\
            <UseFullFontHeight>True</UseFullFontHeight>\
            <Verticalized>False</Verticalized>\
            <StyledText>\
                <Element>\
                    <String xml:space="preserve">DE SANTA MARTA</String>\
                    <Attributes>\
                        <Font Family="Arial" Size="12" Bold="False" Italic="False" Underline="False" Strikeout="False" />\
                        <ForeColor Alpha="255" Red="0" Green="0" Blue="0" HueScale="100" />\
                    </Attributes>\
                </Element>\
            </StyledText>\
        </TextObject>\
        <Bounds X="331" Y="619.860465116279" Width="1861.74418604651" Height="165" />\
    </ObjectInfo>\
</DieCutLabel>';
                var label = dymo.label.framework.openLabelXml(labelXml);

                // set label text
                var companyName = company.value;
                var n = companyName.search('-');

                label.setObjectText("asunto_3", companyName.substr(0, n));
                label.setObjectText("asunto_4", companyName.substr(n + 1));
                label.setObjectText("cbarras", codedocument.value);
                label.setObjectText("fecha", daterec.value)
                label.setObjectText("asunto", 'ASUNTO: ' + subject.value)
                label.setObjectText("remitente", 'REMITENTE: ' + sender.value)
                label.setObjectText("folios", 'FOLIOS: ' + pages.value)
                
                // select printer to print on
                // for simplicity sake just use the first LabelWriter printer
                var printers = dymo.label.framework.getPrinters();
                if (printers.length == 0)
                    throw "No DYMO printers are installed. Install DYMO printers.";

                var printerName = "";
                for (var i = 0; i < printers.length; ++i)
                {
                    var printer = printers[i];
                    if (printer.printerType == "LabelWriterPrinter")
                    {
                        printerName = printer.name;
                        break;
                    }
                }
                
                if (printerName == "")
                    throw "No LabelWriter printers found. Install LabelWriter printer";

                // finally print the label
                var printParams = {};
                printParams.copies = copies.value;
                label.print(printerName, dymo.label.framework.createLabelWriterPrintParamsXml(printParams));
                //label.print(printerName);
            }
            catch(e)
            {
                alert(e.message || e);
            }
        }
    };

   function initTests()
	{
		if(dymo.label.framework.init)
		{
			//dymo.label.framework.trace = true;
			dymo.label.framework.init(onload);
		} else {
			onload();
		}
	}

	// register onload event
	if (window.addEventListener)
		window.addEventListener("load", initTests, false);
	else if (window.attachEvent)
		window.attachEvent("onload", initTests);
	else
		window.onload = initTests;

} ());