/*
 *@author YellowFlash
 *@description YF App Helper JS Functions
 *
 */

function initTableGrid(strTableSelector,gridTitle)
{
    var tableGridObj                =   {};
    tableGridObj.flexHeight         =   true;
    tableGridObj.flexWidth          =   true;
    tableGridObj.editable           =   false;
    tableGridObj.bottomVisible      =   true;
    tableGridObj.scrollModel        =   {horizontal : false};
    tableGridObj.title              =   gridTitle;
    
    var dataModels                  =   $.paramquery.tableToArray(strTableSelector);
    tableGridObj.dataModel          =   {data:dataModels.data, paging:'local'};
    tableGridObj.colModel           =   dataModels.colModel;
    
    strTableSelector.pqGrid(tableGridObj);
    
}