function Page(ele, option) {
    this.parent = document.querySelector(ele);
    this.pageIndex = 1;
    this.options = {
        showNum: 10,
        showPage: 5
    };

    for (var key in option) {
        this.options[key] = option[key];
    }

    this.init();
}

Page.prototype.init = function () {
    this.parent.innerHTML = "";
    var classStr = this.parent.className;
    var classList = classStr.split(" ");

    if (classList.length) {
        if (classList.indexOf("page") == -1) {
            this.parent.className += " page";
        }
    }
    else {
        this.parent.className = "page";
    }

    this.createHTML();
    this.createPage();
}

Page.prototype.createHTML = function () {
    var that = this;
    var prev = document.createElement("span");
    prev.className = "prev";
    prev.innerHTML = "上一页";
    prev.onclick = function () {
        that.pageIndex--;
        that.createPage();
        // console.log(that.pageIndex);
    }
    this.parent.appendChild(prev);

    this.pageBox = document.createElement("ul");
    this.pageBox.className = "pageBox";
    this.parent.appendChild(this.pageBox);

    var next = document.createElement("span");
    next.className = "next";
    next.innerHTML = "下一页";
    next.onclick = function () {
        that.pageIndex++;
        that.createPage();
        // console.log(that.pageIndex);
    }
    this.parent.appendChild(next);

}

Page.prototype.createPage = function () {
    var that = this;
    this.pageBox.innerHTML = "";
    var allPage = Math.ceil(this.options.count / this.options.showNum);

    if (allPage == 0) {
        allPage = 1;
    }

    if (this.pageIndex < 1) {
        this.pageIndex = 1;
    }
    if (this.pageIndex > allPage) {
        this.pageIndex = allPage;
    }

    var mid = Math.floor(this.options.showPage / 2);
    if (this.pageIndex <= mid) {
        var start = 1;
        var end = allPage > this.options.showPage ? this.options.showPage : allPage;
    }
    else if (this.pageIndex > mid && this.pageIndex <= allPage - mid) {
        var start = this.pageIndex - mid;
        var end = this.pageIndex + mid;
        if (this.options.showPage % 2 == 0) {
            // end -= 1;
            start += 1;
        }
    }
    else if (this.pageIndex > allPage - mid) {
        var start = allPage - this.options.showPage + 1;
        var end = allPage;
        // if (this.options.showPage % 2 == 0) {
        //     if (this.pageIndex == allPage - mid) {
        //         start -= 1;
        //         end -= 1;
        //     }
        // }
    }

    if (start < 1) {
        start = 1;
    }
    if (end < 1) {
        end = 1;
    }

    for (let i = start; i <= end; i++) {
        let li = document.createElement("li");
        li.onclick = function () {
            that.pageIndex = i;
            that.createPage();
            // console.log(that.pageIndex);
        }
        if (i == this.pageIndex) {
            li.className = "active";
        }
        li.innerHTML = i;
        this.pageBox.appendChild(li);
    }

    if (this.options.callback) {
        this.options.callback(that.pageIndex - 1);
    }
}