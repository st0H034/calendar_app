<template>
  <div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
      <div class="p-6 bg-white">
        <h3>task calendar</h3>
        <FullCalendar :options="calendarOptions" />
      </div>
    </div>
  </div>

  <!-- <MicroModal /> -->

</template>

<script setup>
import { ref } from 'vue'
import { router } from '@inertiajs/vue3'

import MicroModal from '@/Components/MicroModal.vue'

// カレンダー用のライブラリのインポート
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import listPlugin from '@fullcalendar/list'
import timePlugin from '@fullcalendar/timegrid'
import { formatDate } from '@fullcalendar/core'

const calendarOptions = ref({
  // 使用するプラグインを記述
  plugins: [ dayGridPlugin, interactionPlugin, listPlugin, timePlugin],
  initialView: 'dayGridMonth',

  // イベントのテスト
  events: [
    {
      title: 'event1',
      start: '2023-06-09',
      end: '2023-06-11'
    }
  ],

  // ヘッダーの設定
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right : 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
  },

  //ヘッダーのボタンのテキストの変更
  buttonText: {
    today: '今日',
    month: '月',
    week: '週',
    day: '日',
    list: '予定一覧',
  },

  // カレンダーの全量表示
  contentHeight: 'auto',
  // 日本語化
  locale: 'ja',
  // イベント編集可
  editable: true,
  // 休日を表示
  businessHours: true,
  // 曜日名、週名のクリック可
  navLinks: true,
  // 日付をクリック＆ドラック可能にする
  selectable: true,
  // 現在時刻にインジゲーターの表示
  nowIndicator: true,

  // 日をクリックしたときの処理
  select: function(info){ // カレンダーに予定を追加する関数
    let eventName = prompt("予定を入力して下さい")

    /*
    MicroModal.show('modal-1', {
      awaitCloseAnimation: true,
      disableScroll: true
    });
    */

    if (eventName) {
      this.addEvent({
      title: eventName,
      start: info.start,
      end: info.end,
      allDay: true,
      });
    }
  },

  // イベントをクリックしたときの処理
  eventClick: function(eventinfo){ // イベントを削除する関数

    let starttime = eventinfo.event.start.toISOString().split("T");

    alert(starttime[0])
    if (confirm('予定を削除しますか？')){
      eventinfo.event.remove()
    }
  },

  // イベントが追加されたときに発生する処理
  eventAdd: function(eventinfo){
    // 日付のフォーマットの変換
    let starttime = eventinfo.event.start.toISOString().split("T");
    let endtime = eventinfo.event.end.toISOString().split("T");

    router.visit('Calendar/store',{
      method: 'post',
      data:{
        id: eventinfo.event.id,
        title: eventinfo.event.title,
        start: starttime[0],
        end: endtime[0],
      }
    })
  }


})
</script>