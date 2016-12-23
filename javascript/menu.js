<!-- Begin

var isDOM = (document.getElementById ? true : false);
var isIE4 = ((document.all && !isDOM)? true : false);
var isNS4 = (document.layers ? true : false);
var isNS6 = (document.getElementById&&!document.all ? true : false);

function getRef(id) {
if (isDOM) return document.getElementById(id);
if (isIE4) return document.all[id];
if (isNS4) return document.layers[id];
}

function getSty(id) {
return (isNS4 ? getRef(id) : getRef(id).style);
}

// Hide timeout.
var popTimer = 0;

// Array showing highlighted menu items.
var litNow = new Array();

function popOver(menuNum, itemNum) {
clearTimeout(popTimer);
hideAllBut(menuNum);
litNow = getTree(menuNum, itemNum);
changeCol(litNow, true);
targetNum = menu[menuNum][itemNum].target;

if (targetNum > 0) {
thisX = parseInt(menu[menuNum][0].ref.left) + parseInt(menu[menuNum][itemNum].ref.left);
thisY = parseInt(menu[menuNum][0].ref.top) + parseInt(menu[menuNum][itemNum].ref.top);

with (menu[targetNum][0].ref) {
left = parseInt(thisX + menu[targetNum][0].x);
top = parseInt(thisY + menu[targetNum][0].y);
visibility = 'visible';
      }
   }
}

function popOut(menuNum, itemNum) {
if ((menuNum == 0) && !menu[menuNum][itemNum].target)
hideAllBut(0)
else
popTimer = setTimeout('hideAllBut(0)', 500);
}

function getTree(menuNum, itemNum) {
itemArray = new Array(menu.length);

while(1) {
itemArray[menuNum] = itemNum;
if (menuNum == 0) return itemArray;
itemNum = menu[menuNum][0].parentItem;
menuNum = menu[menuNum][0].parentMenu;
   }
}

function changeCol(changeArray, isOver) {

for (menuCount = 0; menuCount < changeArray.length; menuCount++) {

if (changeArray[menuCount]) {
newCol = isOver ? menu[menuCount][0].overCol : menu[menuCount][0].backCol;

with (menu[menuCount][changeArray[menuCount]].ref) {
if (isNS4) bgColor = newCol;
else backgroundColor = newCol;
         }
      }
   }
}

function hideAllBut(menuNum) {
var keepMenus = getTree(menuNum, 1);
for (count = 0; count < menu.length; count++)
if (!keepMenus[count])
menu[count][0].ref.visibility = 'hidden';
changeCol(litNow, false);
}
function Menu(isVert, popInd, x, y, width, overCol, backCol, borderClass, textClass) {
this.isVert = isVert;
this.popInd = popInd
this.x = x;
this.y = y;
this.width = width;
this.overCol = overCol;
this.backCol = backCol;
this.borderClass = borderClass;
this.textClass = textClass;
this.parentMenu = null;
this.parentItem = null;
this.ref = null;
}

function Item(text, href, frame, length, spacing, target) {
this.text = text;
this.href = href;
this.frame = frame;
this.length = length;
this.spacing = spacing;
this.target = target;
this.ref = null;
}

function writeMenus() {
if (!isDOM && !isIE4 && !isNS4) return;

for (currMenu = 0; currMenu < menu.length; currMenu++) with (menu[currMenu][0]) {
var str = '', itemX = 0, itemY = 0;

for (currItem = 1; currItem < menu[currMenu].length; currItem++) with (menu[currMenu][currItem]) {
var itemID = 'menu' + currMenu + 'item' + currItem;
var w = (isVert ? width : length);
var h = (isVert ? length : width);

if (isDOM || isIE4) {
str += '<div id="' + itemID + '" style="position: absolute; left: ' + itemX + '; top: ' + itemY + '; width: ' + w + '; height: ' + h + '; visibility: inherit; ';
if (backCol) str += 'background: ' + backCol + '; ';
str += '" ';
}

if (isNS4) {
str += '<layer id="' + itemID + '" left="' + itemX + '" top="' + itemY + '" width="' +  w + '" height="' + h + '" visibility="inherit" ';
if (backCol) str += 'bgcolor="' + backCol + '" ';
}

if (borderClass) str += 'class="' + borderClass + '" ';
str += 'onMouseOver="popOver(' + currMenu + ',' + currItem + ')" onMouseOut="popOut(' + currMenu + ',' + currItem + ')">';

str += '<table width="' + (w - 8) + '" border="0" cellspacing="0" cellpadding="' + (!isNS4 && borderClass ? 3 : 0) + '"><tr><td align="left" height="' + (h - 7) + '">' + '<a class="' + textClass + '" href="' + href + '"' + (frame ? ' target="' + frame + '">' : '>') + text + '</a></td>';

if (target > 0) {
menu[target][0].parentMenu = currMenu;
menu[target][0].parentItem = currItem;

if (popInd) str += '<td class="' + textClass + '" align="right">' + popInd + '</td>';
}

str += '</tr></table>' + (isNS4 ? '</layer>' : '</div>');
if (isVert) itemY += length + spacing;
else itemX += length + spacing;
}

if (isDOM) {
var newDiv = document.createElement('div');
document.getElementsByTagName('body').item(0).appendChild(newDiv);
newDiv.innerHTML = str;
ref = newDiv.style;
ref.position = 'absolute';
ref.visibility = 'hidden';
}

if (isIE4) {
document.body.insertAdjacentHTML('beforeEnd', '<div id="menu' + currMenu + 'div" ' + 'style="position: absolute; visibility: hidden">' + str + '</div>');
ref = getSty('menu' + currMenu + 'div');
}

if (isNS4) {
ref = new Layer(0);
ref.document.write(str);
ref.document.close();
}

for (currItem = 1; currItem < menu[currMenu].length; currItem++) {
itemName = 'menu' + currMenu + 'item' + currItem;
if (isDOM || isIE4) menu[currMenu][currItem].ref = getSty(itemName);
if (isNS4) menu[currMenu][currItem].ref = ref.document[itemName];
   }
}

with(menu[0][0]) {
ref.left = x;
ref.top = y;
ref.visibility = 'visible';
   }
}

var menu = new Array();
//coulmenu 
//coulsmenu => couleur du menu deroulant
//coulover
//coulover2
//coulover4

var coulmenu = '#2508FF', coulsmenu='#FFFFFF', coulover = '#FF9900', coulover2 = '#FFFFFF', coulover3 = '#FFFFFF', coulover4 = '#FFFFFF', coulover5 = '#70BDBD', coulover6 = '#99CCCC', coulover7='BFBCCC';
var espace1=10, espace2=0, espace3=0, espace4=0;
var longueur=150;
var espsousmen=hautcel-3;
var hautcel = 22;
var hautcel1 = 22;
var decalhoriz=50;
var decalvert=22;
var decalsous=22;
var decalvertsm;
    Xdeb=160;
    Ydeb=200;
    espsousmen=0;
    decalvertsm=0;
    dim1=150;
    dim2=150;
    long1=0;
    long2=0;
    long3=0;	
    long4=0;
    long5=0;
    long6=0;
    long7=0;
    long8=0;

    longueurcel=0;


menu[0] = new Array();
menu[0][0] = new Menu(false, "", Xdeb, Ydeb, longueurcel, '','' , '', 'itemText');
menu[0][1] = new Item("<div align='right'>Accueil</div>", 'page.php', '', dim1, 5, 0);
menu[0][2] = new Item("<div align='right'>News</div>", 'page.php?num=1', '', dim1, 5, 0);
menu[0][3] = new Item("<div align='right'>Streameur </div>", '#', '', dim1, 5, 1);
menu[0][4] = new Item("<div align='right'> O&ugrave; nous trouver </div>", 'page.php?num=3', '', dim1, 5, 0);
menu[0][5] = new Item("<div align='right'> Contact</div>", 'page.php?num=4', '', dim1, 5, 0);


menu[1] = new Array();
menu[1][0] = new Menu(true, "<img src ='images/images_menu/flechetrans.gif'>", decalhoriz, decalvert,220, coulover, coulsmenu, 'crazyBorder', 'crazyText');
menu[1][1] = new Item('HeXale', 'page.php?num=5', '', hautcel1, espace2, 0);
menu[1][2] = new Item('Lilpac', 'page.php?num=6', '', hautcel1, espace2, 0);
menu[1][3] = new Item('OzZaD', 'page.php?num=7', '', hautcel1, espace2, 0);
menu[1][4] = new Item('Blako', 'page.php?num=8', '', hautcel1, espace2, 0);
