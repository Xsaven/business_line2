<template>
  <div class="reports">
    <div class="my_report" v-if="report">
      <div class="title">Мой отчет</div>
        <div class="upload_report" style="margin-left: 0;" v-if="report.status === 'uploaded' || report.status === 'uploading'">
            <div class="info">
                <div class="status">
                    <v-icon icon="ic_time" class="yellow" />
                    <div>Ваш отчет на проверке</div>
                </div>
                <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
            </div>
        </div>
      <div v-else class="tasks_list">
        <div class="list">
            <div class="report" v-if="report.status === 'canceled'" style="width: 100% !important; padding-bottom: 5px;">
                <div class="error">
                    <v-icon icon="ic_error" />
                    <div>Отчет не прошел модерацию.<br> Причина: {{report.admin_comment ? report.admin_comment : 'отчет не соответствует условиям задания'}}</div>
                </div>
            </div>
            <v-task-report :report="report" />
        </div>
      </div>
    </div>


    <div class="head" id="user-task-reports">
      <div class="title">Отчеты участников ({{meta.total}})</div>
<!--        <div class="sort">-->
<!--            <div class="name">Сортировать:</div>-->

<!--            <v-select name="">-->
<!--                <option value="1" selected>По дате публикации</option>-->
<!--                <option value="2">По лайкам</option>-->
<!--            </v-select>-->
<!--        </div>-->
    </div>

    <div class="empty" v-if="!data.length">Здесь скоро появятся отчеты других участников</div>

      <div class="tasks_list">
          <div class="list">
              <template v-for="(r_report, ind) in data">
                  <v-task-report :report="r_report" :key="`ind_${ind}_${r_report.id}`" />
              </template>
          </div>
      </div>
      <div class="bottom" v-if="meta.last_page > 1" style="margin-top: 10px">
          <div class="pagination">
              <a href="javascript:void(0)" @click="prevPage" :class="{prev: true, disabled: page === 1}"></a>
              <template v-for="(page_range, page_index) in pageRange">
                  <div v-if="page_range==='...'" :key="`sep_${page_index}`" class="sep">...</div>
                  <a v-else href="javascript:void(0)" :key="`page_${page_index}`" @click="setPage(page_range)" :class="{'active': page === page_range}">{{page_range}}</a>
              </template>
              <a href="javascript:void(0)" @click="nextPage" :class="{next: true, disabled: page === meta.last_page}"></a>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  $sync: ['user'],
  name: "v-my-report",
  props: ['report','task','reports'],
  data() {
    return {
      user: {},
        data: this.reports,
        meta: {
            to: 0,
            from: 0,
            total: 0,
            per_page: 0,
            last_page: 0,
            current_page: 0,
        },
        page: 1
    }
  },
    mounted() {
        this.load();
    },
    computed: {
        pageRange () {
            let current = this.meta.current_page;
            let last = this.meta.last_page;
            let delta = 2;
            let left = current - delta;
            let right = current + delta + 1;
            let range = [];
            let pages = [];
            let l;
            for (let i = 1; i <= last; i++) {
                if (i === 1 || i === last || (i >= left && i < right)) {
                    range.push(i);
                }
            }
            range.forEach(function (i) {
                if (l) {
                    if (i - l === 2) {
                        pages.push(l + 1);
                    } else if (i - l !== 1) {
                        pages.push('...');
                    }
                }
                pages.push(i);
                l = i;
            });
            return pages;
        },
        pages () {
            let pages = [];
            if (this.page-2 >= 1 && this.page === this.meta.last_page) { pages.push(this.page-2); }
            if (this.page-1 >= 1) { pages.push(this.page-1); }
            pages.push(this.page);
            if (this.page+1 <= this.meta.last_page) { pages.push(this.page+1); }
            if (this.page+2 <= this.meta.last_page && this.page === 1) { pages.push(this.page+2); }
            return pages;
        }
    },
    watch: {
        page () {
            this.load();
        },
    },
    methods: {
        href(get) {
            return location.pathname + "?sort=" + get
        },
        load () {
            this.loading = true;
            jax.params({page: this.page})
                .task_report
                .pagination(this.task.id, this.sort)
                .then(({data, meta}) => {
                    if (data) {
                        this.data = data;
                        this.meta.to = meta.to;
                        this.meta.from = meta.from;
                        this.meta.total = meta.total;
                        this.meta.per_page = meta.per_page;
                        this.meta.last_page = meta.last_page;
                        this.meta.current_page = meta.current_page;
                        $([document.documentElement, document.body])
                            .animate({scrollTop: $("#user-task-reports").offset().top}, 500);
                    }
                    this.loading = false;
                }).catch(() => {
                    this.loading = false;
                });
        },
        setPage (page) {
            if (!this.loading) {
                this.page = page;
            }
        },
        nextPage () {
            if (!this.loading && this.page < this.meta.last_page) {
                this.page++;
            }
        },
        prevPage () {
            if (!this.loading && this.page > 1) {
                this.page--;
            }
        },
        lastPage () {
            if (!this.loading && this.page !== this.meta.last_page) {
                this.page = this.meta.last_page;
            }
        },
        firstPage () {
            if (!this.loading && this.page !== 1) {
                this.page = 1;
            }
        },
    }
}
</script>

<style scoped>

</style>
