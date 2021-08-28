<template>
    <v-layout>
        <section class="direction_info">
            <div class="cont row">
                <div class="data">
                    <div class="info">
                        <div>
                            <div class="title">{{direction.name}}</div>

                            <div class="desc">{{direction.description}}</div>
                        </div>

                        <div>
                            <div class="members">Участники: 152</div>

                            <button  v-if="!user.subscribe_direction" class="join_btn modal_btn" data-content="#join_modal">Присоединиться</button>
                            <button disabled  v-else class="join_btn modal_btn" data-content="#join_modal">Вы уже подписаны на трек</button>
                        </div>
                    </div>


                    <div class="video" v-if="direction.arbitrator_name">
                        <a href="/" class="link">
                            <v-icon icon="ic_video_play"/>
                        </a>

                        <div class="rating">
                            <div class="stars">
                                <img src="/images/ic_star.svg" alt="">
                                <img src="/images/ic_star.svg" alt="">
                                <img src="/images/ic_star.svg" alt="">
                            </div>

                            <a href="/">Рейтинг участников</a>
                        </div>
                    </div>

                    <div class="author" v-if="direction.arbitrator_name">
                        <div class="avatar">
                            <img :src="`/${direction.arbitrator_photo}`" alt="" class="lozad">
                            <img data-src="/images/bg_direction_author.svg" alt="" class="bg lozad">
                        </div>

                        <div>
                            <div class="name">{{direction.arbitrator_name}}</div>
                            <div class="post">{{direction.arbitrator_position}}</div>
                        </div>
                    </div>

                    <div class="banner" v-else>
                        <img src="/images/tmp/direction_banner_img.jpg" alt="">

                        <div class="rating">
                            <div class="stars">
                                <img src="/images/ic_star.svg" alt="">
                                <img src="/images/ic_star.svg" alt="">
                                <img src="/images/ic_star.svg" alt="">
                            </div>

                            <a href="/">Рейтинг участников</a>
                        </div>
                    </div>
                </div>


                <div class="terms">
                    <div class="title">Условия участия</div>

                    <div class="desc" v-html="direction.terms_of_participation"></div>

                    <a href="/" class="link">Условия участия</a>
                </div>


                <div class="prizes">
                    <div class="title">Призы</div>

                    <div class="row_wrap">
                        <div class="row">
                            <div class="item" v-for="prize in prizes">
                                <div class="thumb">
                                    <img :src="`/${prize.src}`" alt="" class="lozad">
                                </div>

                                <div class="name">{{prize.name}}</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="schedule">
                    <div class="title">Расписание активностей</div>

                    <div class="head">
                        <div class="exp">
                            <div><div class="color color1"></div>Мгновенные</div>
                            <div><div class="color color2"></div>Быстрые</div>
                            <div><div class="color color3"></div>Многодневные</div>
                        </div>

                        <div class="challenge">
                            <div class="title">Челлендж на месяц</div>
                            <div class="duration">13.09 – 8.10</div>
                            <div class="name">Стульчик-челлендж</div>
                        </div>
                    </div>


                    <div class="week_wrap" v-for="(date, date_index) in dates">
                        <div class="week">
                            <div class="days">
                              <template v-for="(day, day_index) in date">
                                <div :class="{day: true, weekend: day_index >= 5}" >
                                  <div class="number">{{String(day).split('-')[2]}}</div>
                                  <div class="month">{{month[String(day).split('-')[1]]}}</div>
                                </div>
                              </template>
                            </div>

                            <div class="events">
<!--                              <template v-for="id_day in tasks_calendar[date_index]">-->
<!--                                <template v-for="id in id_day">-->
<!--                                  <a v-if="id" href="/" class="item color1" :data-group="id" :key="id_day+id">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">{{id}}</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                      <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                  </a>-->
<!--                                  <div v-else :class="{item: true, weekend: day_index >= 5}"></div>-->
<!--                                </template>-->
<!--                              </template>-->
                                                              <a href="/" class="item color3 break_left" data-group="1">
                                                                  <div class="time"><span></span><span>Финал: 18:00</span></div>
                                                                  <div class="name"></div>

                                                                  <button class="favorite_btn">
                                                                      <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <a href="/" class="item color2">
                                                                  <div class="time"><span>С 7:30 до 12:00</span></div>
                                                                  <div class="name">123м Попади в мусорную корзину / урну мячиком, сделанным ...</div>

                                                                  <button class="favorite_btn">
                                                                      <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <a href="/" class="item color1">
                                                                  <div class="time"><span>9:00-18:00</span></div>
                                                                  <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>

                                                                  <button class="favorite_btn">
                                                                      <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <a href="/" class="item color2">
                                                                  <div class="time"><span>С 7:30 до 12:00</span></div>
                                                                  <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>

                                                                  <button class="favorite_btn">
                                                                     <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <a href="/" class="item color3 break_right" data-group="2">
                                                                  <div class="time"><span>Начало: 9:00</span></div>
                                                                  <div class="name">Сложи пять олимпийских колец из подручных...</div>
                                                              </a>

                                                              <div class="item weekend"></div>
                                                              <div class="item weekend"></div>

                                                              <a href="/" class="item color2">
                                                                  <div class="time"><span>С 7:30 до 12:00</span></div>
                                                                  <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>

                                                                  <button class="favorite_btn">
                                                                      <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <div class="item"></div>

                                                              <a href="/" class="item width3 color3">
                                                                  <div class="time"><span>Начало: 9:00</span><span>Финал: 18:00</span></div>
                                                                  <div class="name">Сложи пять олимпийских колец из подручных средств и пришли креативное фото (из шнурков на полу / 5 шин / яблок)</div>

                                                                  <button class="favorite_btn">
                                                                      <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <div class="item weekend"></div>
                                                              <div class="item weekend"></div>

                                                              <a href="/" class="item width3 color3">
                                                                  <div class="time"><span>Начало: 9:00</span><span>Финал: 18:00</span></div>
                                                                  <div class="name">Сложи пять олимпийских колец из подручных средств и пришли креативное фото (из шнурков на полу / 5 шин / яблок)</div>

                                                                  <button class="favorite_btn">
                                                                      <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <div class="item"></div>

                                                              <a href="/" class="item color1">
                                                                  <div class="time"><span>9:00-18:00</span></div>
                                                                  <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>

                                                                  <button class="favorite_btn">
                                                                      <v-icon icon="ic_flag" />
                                                                  </button>
                                                              </a>

                                                              <div class="item weekend"></div>
                                                              <div class="item weekend"></div>
                            </div>
                        </div>
                    </div>


<!--                    <div class="week_wrap">-->
<!--                        <div class="week">-->
<!--                            <div class="days">-->
<!--                                <div class="day">-->
<!--                                    <div class="number">13</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">14</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">15</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">16</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">17</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day weekend">-->
<!--                                    <div class="number">18</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day weekend">-->
<!--                                    <div class="number">19</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="events">-->
<!--                                <a href="/" class="item color3 break_left" data-group="1">-->
<!--                                    <div class="time"><span></span><span>Финал: 18:00</span></div>-->
<!--                                    <div class="name"></div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color1">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                       <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color3 break_right" data-group="2">-->
<!--                                    <div class="time"><span>Начало: 9:00</span></div>-->
<!--                                    <div class="name">Сложи пять олимпийских колец из подручных...</div>-->
<!--                                </a>-->

<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item"></div>-->

<!--                                <a href="/" class="item width3 color3">-->
<!--                                    <div class="time"><span>Начало: 9:00</span><span>Финал: 18:00</span></div>-->
<!--                                    <div class="name">Сложи пять олимпийских колец из подручных средств и пришли креативное фото (из шнурков на полу / 5 шин / яблок)</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->

<!--                                <a href="/" class="item width3 color3">-->
<!--                                    <div class="time"><span>Начало: 9:00</span><span>Финал: 18:00</span></div>-->
<!--                                    <div class="name">Сложи пять олимпийских колец из подручных средств и пришли креативное фото (из шнурков на полу / 5 шин / яблок)</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item"></div>-->

<!--                                <a href="/" class="item color1">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


<!--                    <div class="week_wrap">-->
<!--                        <div class="week">-->
<!--                            <div class="days">-->
<!--                                <div class="day">-->
<!--                                    <div class="number">13</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">14</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">15</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">16</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">17</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day weekend">-->
<!--                                    <div class="number">18</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day weekend">-->
<!--                                    <div class="number">19</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="events">-->
<!--                                <a href="/" class="item width2 color3 break_left" data-group="2">-->
<!--                                    <div class="time"><span></span><span>Финал: 18:00</span></div>-->
<!--                                    <div class="name"></div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item width2 color3 break_right" data-group="3">-->
<!--                                    <div class="time"><span>Начало: 9:00</span></div>-->
<!--                                    <div class="name">Сложи пять олимпийских колец из подручных средств и пришли креативное фото (из шнурков на полу / 5 шин / яблок)</div>-->
<!--                                </a>-->

<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item width3 color3">-->
<!--                                    <div class="time"><span>Начало: 9:00</span><span>Финал: 18:00</span></div>-->
<!--                                    <div class="name">Сложи пять олимпийских колец из подручных средств и пришли креативное фото (из шнурков на полу / 5 шин / яблок)</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->

<!--                                <div class="item"></div>-->

<!--                                <a href="/" class="item color1">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item"></div>-->

<!--                                <a href="/" class="item color1">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item"></div>-->
<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->


<!--                    <div class="week_wrap">-->
<!--                        <div class="week">-->
<!--                            <div class="days">-->
<!--                                <div class="day">-->
<!--                                    <div class="number">13</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">14</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">15</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">16</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day">-->
<!--                                    <div class="number">17</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day weekend">-->
<!--                                    <div class="number">18</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->

<!--                                <div class="day weekend">-->
<!--                                    <div class="number">19</div>-->
<!--                                    <div class="month">Сентября</div>-->
<!--                                </div>-->
<!--                            </div>-->

<!--                            <div class="events">-->
<!--                                <a href="/" class="item width2 color3 break_left" data-group="3">-->
<!--                                    <div class="time"><span></span><span>Финал: 18:00</span></div>-->
<!--                                    <div class="name"></div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color1">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item width3 color3">-->
<!--                                    <div class="time"><span>Начало: 9:00</span><span>Финал: 18:00</span></div>-->
<!--                                    <div class="name">Сложи пять олимпийских колец из подручных средств и пришли креативное фото (из шнурков на полу / 5 шин / яблок)</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <a href="/" class="item color2">-->
<!--                                    <div class="time"><span>С 7:30 до 12:00</span></div>-->
<!--                                    <div class="name">Попади в мусорную корзину / урну мячиком, сделанным ...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->

<!--                                <div class="item"></div>-->

<!--                                <a href="/" class="item color1">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item"></div>-->

<!--                                <a href="/" class="item color1">-->
<!--                                    <div class="time"><span>9:00-18:00</span></div>-->
<!--                                    <div class="name">10 000 шагов челлендж. Пришли селфи с шагомеро...</div>-->

<!--                                    <button class="favorite_btn">-->
<!--                                        <v-icon icon="ic_flag" />-->
<!--                                    </button>-->
<!--                                </a>-->

<!--                                <div class="item"></div>-->
<!--                                <div class="item weekend"></div>-->
<!--                                <div class="item weekend"></div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </section>

        <section class="modal" id="join_modal">
            <div class="title">Внимание</div>

            <div class="desc">Вы можете выбрать только один трек. Дальнейшее изменение направления будет невозможным.</div>

            <form action="" class="form">
                <div class="field">
                    <input v-model="first_checkbox" type="checkbox" name="agree" id="agree_check1" :class="{'error': !first_checkbox}" checked>
                    <label for="agree_check1">Я ознакомлен с правилами и принимаю условия</label>
                </div>

                <div class="field">
                    <input v-model="second_checkbox" type="checkbox" name="agree" id="agree_check2" :class="{'error': !second_checkbox}">
                    <label for="agree_check2">Я ознакомлен с информацией о том, что выбрать трек для участия можно только один раз</label>
                </div>
                <div class="submit">
                    <button  @click.prevent.stop="follow()" :disabled="!(first_checkbox && second_checkbox)" class="submit_btn">Присоединиться</button>
                </div>
            </form>
        </section>
    </v-layout>
</template>

<script>
    export default {
        name: "pages_direction",
        $sync: ['user'],
        props: {
            direction: {required:true},
            prizes: {required:true},
            dates: {required:true},
            tasks_calendar: {required:true},
        },
        data () {
            return {
                first_checkbox: true,
                second_checkbox: false,
                user: {},
                month: {
                  '01': 'Января',
                  '02': 'Февраля',
                  '03': 'Марта',
                  '04': 'Апреля',
                  '05': 'Мая',
                  '06': 'Июня',
                  '07': 'Июля',
                  '08': 'Августа',
                  '09': 'Сентября',
                  '10': 'Октября',
                  '11': 'Ноября',
                  '12': 'Декабря',
                }
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            follow() {
                jax.user.follow_direction(this.direction.id)
                    .then(() => {
                        Fancybox.close();
                    })
            },
        }
    }
</script>
