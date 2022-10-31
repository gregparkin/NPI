<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>grid2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/redmond/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js"></script>
    <script>
        //<![CDATA[
        $(function () {
            "use strict";
            $(mainGrid).jqGrid({
                url:      'ajax_jqgrid_toolbar_open_tickets.php',
                mtype:    "GET",
                datatype: "json",
                ajaxGridOptions: { contentType: 'application/json; charset=utf-8', cache: false },
                postData:
                    {
                        action:         'get',
                        where_clause:   '',
                        order_by:       't.ticket_no',
                        direction:      'asc',
                        what_tickets:   '<?php echo $what_tickets; ?>',
                        what_hostname:  '<?php echo $what_hostname; ?>',
                        what_netpin_no: '<?php echo $what_netpin_no; ?>',
                        what_cuid:      '<?php echo $what_cuid; ?>',
                        approve_filter: approve_filter
                    },
                colModel: [
                    {
                        label:          'Remedy CM #',
                        name:           'cm_ticket_no',
                        index:          'cm_ticket_no',
                        sortable:       true,
                        sorttype:       'string',
                        firstsortorder: 'desc',
                        align:          'left',
                        width:          120,
                        hidden:         false,
                        search:         true,
                        searchoptions:  { sopt: ['eq','bw','bn','cn','nc','ew','en'] }
                    },
                    {
                        key:           true,
                        label:         'CCT Ticket #',
                        name:          'ticket_no',
                        align:         'left',
                        width:         120,
                        sortable:       true,
                        sorttype:       'string',
                        search:        true,
                        searchoptions: { sopt: ['eq','bw','bn','cn','nc','ew','en'] }
                    },
                    {
                        label:         'Work Activity',
                        name:          'work_activity',
                        width:         120,
                        align:         'left',
                        search:        true,
                        searchoptions: { sopt: ['eq','bw','bn','cn','nc','ew','en'] }
                    },
                    {
                        label:         'Status',
                        name:          'status',
                        width:         100,
                        align:         'left',
                        sortable:      true,
                        sorttype:      'string',
                        search:        true,
                        stype:         "select",
                        searchoptions:
                            {
                                value:     "DRAFT:DRAFT;ACTIVE:ACTIVE;CANCELED:CANCELED;DELETED:DELETED;FROZEN:FROZEN",
                                defaultValue: "ACTIVE"
                            }
                    },
                    {
                        label:         'Create Date',
                        name:          'insert_date',
                        width:         150,
                        align:         'left',
                        sortable:      true,
                        sorttype:      'string',
                        search:        true,
                        searchoptions:
                            {
                                sopt: ['eq','ne','lt','le','gt','ge'],
                                dataInit: function (elem)
                                {
                                    $(elem).datetimepicker(
                                        {
                                            changeMonth: true,
                                            changeYear: true,
                                            showSecond:true,
                                            dateFormat:'mm/dd/yy',
                                            timeFormat:'hh:mm',
                                            hourGrid: 4,
                                            minuteGrid: 10,
                                            secondGrid: 10,
                                            addSliderAccess: true,
                                            sliderAccessArgs: { touchonly: false }
                                        }
                                    );
                                }
                            }
                    },
                    {
                        label:         'Owner CUID',
                        name:          'owner_cuid',
                        align:         'left',
                        hidden:        true,
                        sortable:      true,
                        sorttype:      'string',
                        search:        true,
                        stype:         "select",
                        searchoptions:
                            {
                                value:     "ALL:ALL;<?php printf("%s;%s", $_SESSION['user_cuid'], $_SESSION['user_cuid']); ?>",
                                defaultValue: "<?php printf("%s", $_SESSION['user_cuid']); ?>"
                            }
                    },
                    {
                        label:         'Ticket Owner',
                        name:          'owner_name',
                        width:         570,
                        align:         'left',
                        sortable:      true,
                        sorttype:      'string',
                        search:        true,
                        searchoptions: { sopt: ['eq','bw','bn','cn','nc','ew','en'] }
                    },
                    {
                        label:         'Schedule From',
                        name:          'schedule_start_date',
                        width:         150,
                        align:         'left',
                        sortable:      true,
                        sorttype:      'string',
                        hidden:        true,
                        search:        true,
                        searchoptions:
                            {
                                sopt: ['eq','ne','lt','le','gt','ge'],
                                dataInit: function (elem) {
                                    $(elem).datepicker(
                                        {
                                            dateFormat: 'mm/dd/yy',
                                            changeYear: true,
                                            changeMonth: true,
                                            showWeek: true
                                        }
                                    );
                                }
                            }
                    },
                    {
                        label:         'Schedule To',
                        name:          'schedule_end_date',
                        width:         150,
                        align:         'left',
                        sortable:      true,
                        sorttype:      'string',
                        hidden:        true,
                        search:        true,
                        searchoptions:
                            {
                                sopt: ['eq','ne','lt','le','gt','ge'],
                                dataInit: function (elem) {
                                    $(elem).datepicker(
                                        {
                                            dateFormat: 'mm/dd/yy',
                                            changeYear: true,
                                            changeMonth: true,
                                            showWeek: true
                                        }
                                    );
                                }
                            }
                    },
                    {
                        label:         'Approve',
                        name:          'approvals_required',
                        width:         70,
                        align:         'center',
                        sortable:      true,
                        sorttype:      'string',
                        search:        true,
                        stype:         "select",
                        searchoptions:
                            {
                                value:     "All:All;Yes:Yes;No:No",
                                defaultValue: "All"
                            }
                    },
                    {
                        label:         'Reboots',
                        name:          'reboot_required',
                        width:         70,
                        align:         'center',
                        sortable:      true,
                        sorttype:      'string',
                        search:        true,
                        stype:         "select",
                        searchoptions:
                            {
                                value:     "All:All;Yes:Yes;No:No",
                                defaultValue: "All"
                            }
                    },
                    {
                        label:         'Respond',
                        name:          'respond_by_date',
                        width:         120,
                        align:         'left',
                        sortable:      true,
                        sorttype:      'string',
                        search:        true,
                        searchoptions:
                            {
                                sopt: ['eq','ne','lt','le','gt','ge'],
                                dataInit: function (elem) {
                                    $(elem).datepicker(
                                        {
                                            dateFormat: 'mm/dd/yy',
                                            changeYear: true,
                                            changeMonth: true,
                                            showWeek: true
                                        }
                                    );
                                }
                            }
                    },
                    {
                        label:         'TOTAL',
                        name:          'total_servers_scheduled',
                        align:         'center',
                        width:         70,
                        search:        true,
                        searchoptions: { sopt: ['eq','ne','lt','le','gt','ge'] }
                    },
                    {
                        label:         'WAITING',
                        name:          'total_servers_waiting',
                        align:         'center',
                        width:         70,
                        search:        true,
                        searchoptions: { sopt: ['eq','ne','lt','le','gt','ge'] }
                    },
                    {
                        label:         'READY',
                        name:          'total_servers_approved',
                        align:         'center',
                        width:         70,
                        search:        true,
                        searchoptions: { sopt: ['eq','ne','lt','le','gt','ge'] }
                    },
                    {
                        label:         'REJECTED',
                        name:          'total_servers_rejected',
                        align:         'center',
                        width:         85,
                        search:        true,
                        searchoptions: { sopt: ['eq','ne','lt','le','gt','ge'] }
                    }
                ],
                multiSort:          true,
                caption:            tickets_caption,
                width:              '100%',
                height:             '100%',
                rowNum:             25,
                viewrecords:        true,
                altRows:            true,
                viewsortcols:       true,
                loadtext:           'Loading Tickets',
                imgpath:            'images',
                subGrid:            true,
                subGridRowExpanded: subgrid1,
                pager: mainGridPager,
                onSelectRow: function(ticket_no, selected)
                {
                    if (ticket_no.length == 0)
                    {
                        alert('No CCT Ticket number specified!');
                        return;
                    }

                    last_ticket_no_selected = ticket_no;

                    openTicketDialog(ticket_no, ticket_no);

                    //alert('Row selected: ' + ticket_no);

                    // Retrieve the following from the grid: ticket_status

                    //openTicketDialog("Remedy Ticket as stored in CCT database.", cm_ticket_no);

                    /*
                     var url = 'view_cct7_ticket.php?ticket=' + cm_ticket_no;

                     var height = 640;  // 605
                     var width  = 970;  // 910
                     var left = (screen.width/2) - (width/2);
                     var top  = (screen.heigth/2) - (height/2);
                     var options = 'resizable=yes,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no, ' +
                     'height=' + height + ',width=' + width + ',top=' + top + ',left=' + left;

                     var newwindow = window.open(url, 'newwindow', options).focus();
                     newwindow.moveTo(0, 0);
                     */
                },
                loadComplete: function()
                {
                    var ids = $(this).jqGrid("getDataIDs"), l = ids.length, i, rowid, status;

                    for (i = 0; i < l; i++)
                    {
                        rowid = ids[i];

                        //
                        // This is column index value used to update the cell for status.
                        // If you change the columns in the ticketGrids you need adjust this value.
                        //
                        colid = 3;

                        //
                        // get data from some column "ColumnName"
                        //
                        var ColumnName = $(this).jqGrid("getCell", rowid, "status");

                        switch ( ColumnName )
                        {
                            case 'DRAFT':    // DRAFT    - Magenta         #FF00FF
                                $(this).setCell(rowid , colid, "DRAFT",    { color: '#FF00FF'});
                                break;
                            case 'ACTIVE':   // ACTIVE   - navy            #000080
                                $(this).setCell(rowid , colid, "ACTIVE",   { color: '#000080'});
                                break;
                            case 'FROZEN':   // FROZEN   - dark slate gray #2F4F4F
                                $(this).setCell(rowid , colid, "FROZEN",   { color: '#2F4F4F'});
                                break;
                            case 'WAITING':  // WAITING  - Teal            #008080
                                $(this).setCell(rowid , colid, "WAITING",  { color: '#008080'});
                                break;
                            case 'APPROVED': // APPROVED - dark green      #006400
                                $(this).setCell(rowid , colid, "APPROVED", { color: '#006400'});
                                break;
                            case 'REJECTED': // REJECTED - Maroon          #800000
                                $(this).setCell(rowid , colid, "REJECTED", { color: '#800000'});
                                break;
                            case 'EXEMPT':   // EXEMPT   - orange red      #FF4500
                                $(this).setCell(rowid , colid, "EXEMPT",   { color: '#FF4500'});
                                break;
                            case 'CANCELED': // CANCELED - Indian Red      #CD5C5C
                                $(this).setCell(rowid , colid, "CANCELED", { color: '#CD5C5C'});
                                break;
                            case 'CLOSED':   // CLOSED   - black           #000000
                                $(this).setCell(rowid , colid, "CLOSED",   { color: '#000000'});
                                break;
                            default:
                                break;
                        }
                    }
                }
            });
        //]]>
    </script>
</head>
<body>
<table id="mainGrid"></table>
</body>
</html>
