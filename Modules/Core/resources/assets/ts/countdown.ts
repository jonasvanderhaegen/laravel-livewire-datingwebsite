import "number-flow";

Alpine.data("countdown", (iso: any) => ({
    flows: {},
    init() {
        // Parse target date from ISO string and ensure it's treated as a specific point in time
        this.targetDate = new Date(iso).getTime();

        // refs to the number-flow elements
        this.flows = {
            dd: this.$refs.dd, // days
            hh: this.$refs.hh, // hours
            mm: this.$refs.mm, // minutes
            ss: this.$refs.ss, // seconds
        };

        // limit the rolling wheels so 59 ➜ 00 animates smoothly
        this.flows.hh.digits = { 1: { max: 2 }, 0: { max: 9 } }; // hours 0-23
        this.flows.mm.digits = { 1: { max: 5 }, 0: { max: 9 } }; // minutes 0-59
        this.flows.ss.digits = { 1: { max: 5 }, 0: { max: 9 } }; // seconds 0-59

        this.tick(); // draw immediately
        this.timer = setInterval(() => this.tick(), 1_000);
    },
    tick() {
        const now = Date.now();
        const diff = Math.max(0, this.targetDate - now);

        if (diff === 0) clearInterval(this.timer); // stop at zero

        // Calculate days, hours, minutes, and seconds properly
        const days = Math.floor(diff / (24 * 3600 * 1000));
        const hours = Math.floor((diff % (24 * 3600 * 1000)) / (3600 * 1000));
        const minutes = Math.floor((diff % (3600 * 1000)) / (60 * 1000));
        const seconds = Math.floor((diff % (60 * 1000)) / 1000);

        this.flows.dd.update(days);
        this.flows.hh.update(hours);
        this.flows.mm.update(minutes);
        this.flows.ss.update(seconds);
    },
    destroy() {
        clearInterval(this.timer);
    }, // tidy up
}));
