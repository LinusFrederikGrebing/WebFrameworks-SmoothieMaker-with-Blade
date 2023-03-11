
gsap.fromTo(
    "#left-text",
    {
      scale: 0,
      opacity: 0,
      y: 200,
    },
    {
      y: 0,
      delay: 0.2,
      duration: 2,
      scale: 1,
      opacity: 1,
      ease: "power3.out",
    }
  );
  gsap.fromTo(
    "#right-img",
    {
      x: 500,
      scale: 0,
      opacity: 0,
    },
    {
      x: 0,
      delay: 0.2,
      duration: 2,
      scale: 1,
      opacity: 1,
      ease: "power3.out",
    }
  );

gsap.fromTo(
  "#tipsheader",
  {
    opacity: 0,
  },
  {
    opacity: 1,
    scrollTrigger: {
      trigger: "#tipsheader",
      start: "top 90%",
      end: "bottom 95%",
      scrub: true,
      id: "scrub",
    },
  }
);
gsap.fromTo(
  "#tip1",
  {
    y: 0,
    x: 1000,
    opacity: 0,
  },
  {
    opacity: 1,
    x: 0,
    scrollTrigger: {
      trigger: "#tip1",
      start: "top 90%",
      end: "bottom 95%",
      scrub: true,
      id: "scrub",
    },
  }
);
gsap.fromTo(
  "#tip2",
  {
    y: 0,
    x: -1000,
    opacity: 0,
  },
  {
    opacity: 1,
    x: 0,
    scrollTrigger: {
      trigger: "#tip2",
      start: "top 90%",
      end: "bottom 95%",
      scrub: true,
      id: "scrub",
    },
  }
);
gsap.fromTo(
  "#tip3",
  {
    y: 0,
    x: 1000,
    opacity: 0,
  },
  {
    opacity: 1,
    x: 0,
    scrollTrigger: {
      trigger: "#tip3",
      start: "top 90%",
      end: "bottom 95%",
      scrub: true,
      id: "scrub",
    },
  }
);

  gsap.timeline({ delay: 0, 
    scrollTrigger: {
    trigger: "#steps",
    start: "top 80%",
    end: "bottom 0%",
    toggleActions: "play reset play reset ",
  },})
  .fromTo("#stepsheader",  {
    delay: 0,
    opacity: 0,
  },
  {
    opacity: 1,
  })
  .fromTo("#step1",  {
    delay: 0.5,
    y: 300,
    opacity: 0,
  },
  {
    opacity: 1,
    y: 0,
  })
  .fromTo("#step2",  {
    y: 300,
    delay: 0.5,
    opacity: 0,
  },
  {
    opacity: 1,
    y: 0,
  })
  .fromTo("#step3",  {
    delay: 0.5,
    y: 300,
    opacity: 0,
  },
  {
    opacity: 1,
    y: 0,
  });

  
  function hoverEnter(obj) {
    console.log(obj);
    gsap.to(obj.target, {
      duration: 0.2,
      scale: 1.05,
    });
  };
  function hoverLeave(obj) {
    gsap.to(obj.target, { duration: 0.2, scale: 1 });
  };
  function enterGrid() {
    for (let i = 1; i <= 4; i++) {
      let element = document.getElementById("bottle-card" + i);
      let start = 1400;
      if(i % 2 == 0) { start = -1400 } 
      gsap.fromTo(
        element,
        {
          x: start
        },
        {
          duration: 1,
          x: 0
        }
      );
    }
  };