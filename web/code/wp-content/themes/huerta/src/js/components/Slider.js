/* eslint-disable */
"use strict";

import Swiper from "swiper";
import { select } from "../helpers";

export default class SwiperInit {
  constructor(swiperInstance, args) {
    this.swiperInstance = swiperInstance;
    this.args = args;

    if (!this.swiperInstance) {
      console.error("Swiper Instance Error: missing swiper container");
    } else {
      this.init();
    }
  }

  init() {
    this.uniqueID = this.setUniqueID();
    this.setObserver();
  }

  setUniqueID() {
    return "_" + Math.random().toString(36).substr(2, 9);
  }
  setObserver() {
    if (select(this.swiperInstance)) {
      let count;

      let observer = new IntersectionObserver((entries) => {
        entries.map((entry) => {
          if (entry.isIntersecting && !count) {
            count = true;
            this.setSwiper(this.uniqueID);
          }
        });
      });

      observer.observe(select(this.swiperInstance));
    }
  }

  setSwiper(id) {
    /* eslint-disable-next-line */
    id = new Swiper(`${this.swiperInstance}`, this.args);
  }
}
