<?php //pr($share_tasks);//echo $this->element('info-blocks');                             ?>
<div class="block">
    <div class="fullcalendarTask"></div>
</div>
<script type="text/javascript">
    $(function () {
        //      
        var calendar = $('.fullcalendarTask').fullCalendar({
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay, id) {

                $.fancybox.open({
                    href: 'tasks/popup_add',
                    type: 'iframe',
                    padding: 5,
                    ajax: {
                        type: "POST",
                        cache: false,
                        url: 'tasks/popup_add',
                        data: $("#TaskAddForm").serializeArray(),

                        success: function (data) {
                            // on success, post (preview) returned data in fancybox
                            alert(data);
                        }
                    }
                });


                //                var title = prompt('Event Title:');
                //                if (title) {
                //                    calendar.fullCalendar('renderEvent',
                //                    {
                //                        title: title,
                //                        start: start,
                //                        end: end,
                //                        allDay: allDay
                //                    },
                //                    true // make the event "stick"
                //                );
                //                }
                calendar.fullCalendar('unselect');
            },
            editable: true,
            events: [
                    <?php foreach ($own_create_tasks as $task) { ?>{
                    id: '<?php echo $task['Task']['id']; ?>',
                    title: '<?php echo $task['Task']['title']; ?>',
                    start: '<?php echo $task['Task']['start_date']; ?>',
                    end: '<?php echo $task['Task']['end_date']; ?>',
                    className: 'own_created_task',
                    allDay: false
                }, <?php } ?>
                    <?php foreach ($share_tasks as $sharetask) { ?>{
                    id: '<?php echo $sharetask['Task']['id']; ?>',
                    title: '<?php echo $sharetask['Task']['title']; ?>',
                    start: '<?php echo $sharetask['Task']['start_date']; ?>',
                    end: '<?php echo $sharetask['Task']['end_date']; ?>',
                    className: 'share_task',
                    allDay: false
                }, <?php } ?>
            ],
            eventClick: function (calEvent, jsEvent, view) {
                $("#taskViewModal").attr('href', 'tasks/viewTask/' + calEvent.id);
                $("#taskViewModal").click();

            }


        });
    });
</script>
<a data-target="#remote_modal" href="#" role="button" data-toggle="modal" id="taskViewModal" style="display:none;">..</a>
<div id="remote_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>
<style type="text/css">
    .own_created_task {
        background: #00cc33;
    }
</style>