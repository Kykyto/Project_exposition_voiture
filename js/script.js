function changeReview(id) {
  var status = document.getElementById("status" + id).value;
  $.ajax({
    url: "/Project/Api/api.php",
    method: "POST",
    data: { status: status, ReviewID: id, updateReview: 1 },
    dataType: "json",
    success: function (data) {
      alert("Review updated successfully");
      if (status === "Rejected") {
        blockUser(id);
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
}
function deleteReview(id) {
  if (confirm("Are you sure you want to delete this review?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { ReviewID: id, deleteReview: 1 },
      dataType: "json",
      success: function (data) {
        alert("Review deleted successfully");
        location.reload();
      },
      error: function (error) {
        console.log("error", error);
      },
    });
  }
}

function deleteNews(id) {
  if (confirm("Are you sure you want to delete this News?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { NewsID: id, deleteNews: 1 },
      dataType: "json",
      success: function (data) {
        alert("News deleted successfully");
        location.reload();
      },
      error: function (error) {
        console.log("error", error);
      },
    });
  }
}
function deleteVehicule(id) {
  if (confirm("Are you sure you want to delete this Vehicle?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { VehicleID: id, deleteVehicle: 1 },
      dataType: "json",
      success: function (data) {
        alert("Vehicle deleted successfully");
        location.reload();
      },
      error: function (error) {
        console.log("error", error);
      },
    });
  }
}
function deleteGuide(id) {
  if (confirm("Are you sure you want to delete this Guide?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { ImageID: id, deleteGuide: 1 },
      dataType: "json",
      success: function (data) {
        alert("Guide deleted successfully");
        location.reload();
      },
      error: function (error) {
        console.log("error", error);
      },
    });
  }
}
function deleteBrand(id, ImageID, ImagePath) {
  if (confirm("Are you sure you want to delete this Brand?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { BrandID: id, deleteBrand: 1, ImageID, ImagePath },
      dataType: "json",
      success: function (data) {
        alert("Brand deleted successfully");
        window.location.href = "/Project/Admin/brands/";
      },
      error: function (error) {
        console.log("error", error);
      },
    });
  }
}
function deleteUser(id) {
  if (confirm("Are you sure you want to delete this user?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { UserID: id, deleteUser: 1 },
      dataType: "json",
      success: function (data) {
        alert("User deleted successfully");
        location.reload();
      },
      error: function (error) {
        console.log("error", error);
      },
    });
  }
}
function deleteNews(id) {
  if (confirm("Are you sure you want to delete this News?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { NewsID: id, deleteNews: 1 },
      dataType: "json",
      success: function (data) {
        alert("News deleted successfully");
        location.reload();
      },
      error: function (error) {
        console.log("error", error);
      },
    });
  }
}
function blockUser(id) {
  if (confirm("Do you want to block this user?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { UserID: id, blockUser: 1 },
      dataType: "json",
      success: function (data) {
        alert("User blocked successfully");
        location.reload();
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
}

function deleteItem(vehicleID, userID) {
  if (confirm("Do you want to delete this favorite?")) {
    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: { VehicleID: vehicleID, UserID: userID, deleteFavorite: 1 },
      dataType: "json",
      success: function (data) {
        $('[data-vehicleid="' + vehicleID + '"]').remove();
        if ($(".favorite-container").children().length === 0) {
          $(".favorite-container").append(
            "<p>There are no favorite vehicles for this profile</p>"
          );
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
}

var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,
  spaceBetween: 25,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 2,
    },
    950: {
      slidesPerView: 3,
    },
  },
});

const root = document.documentElement;
const spinnerElementsDisplayed = getComputedStyle(root).getPropertyValue(
  "--spinner-elements-displayed"
);
const spinnerContent = document.querySelector("ul.spinner-content");
let offset = 12;
const limit = 10;

if (spinnerContent) {
  root.style.setProperty("--spinner-elements", spinnerContent.children.length);

  for (let i = 0; i < spinnerElementsDisplayed; i++) {
    spinnerContent.appendChild(spinnerContent.children[i].cloneNode(true));
  }
}
function updateGuide(guideID) {
  var updatedTitle = $("input[data-guide-id='" + guideID + "']").val();
  var updatedDescription = $("textarea[data-guide-id='" + guideID + "']").val();

  $.ajax({
    url: "/Project/Api/api.php",
    method: "POST",
    data: {
      updateGuide: 1,
      guideID: guideID,
      title: updatedTitle,
      description: updatedDescription,
    },
    dataType: "json",
    success: function (response) {
      alert("Guide updated successfully!");
    },
    error: function (error) {
      console.log("Error updating guide", error);
    },
  });
}
function updateGuide(guideID) {
  var updatedTitle = $("input[data-guide-id='" + guideID + "']").val();
  var updatedDescription = $("textarea[data-guide-id='" + guideID + "']").val();
  var image = $("img[data-guide-id='" + guideID + "']").data("img-src");

  var formData = new FormData();
  formData.append("updateGuide", 1);
  formData.append("guideID", guideID);
  formData.append("title", updatedTitle);
  formData.append("description", updatedDescription);
  formData.append("imageName", image);

  var updatedImage = $("input[type='file'][data-guide-id='" + guideID + "']")[0]
    .files[0];
  if (updatedImage) {
    formData.append("image", updatedImage);
  }

  $.ajax({
    url: "/Project/Api/api.php",
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    dataType: "json",
    success: function (response) {
      location.reload();
    },
    error: function (error) {
      console.log("Error updating guide", error);
    },
  });
}
let page = 1;
function createPagination(totalPages, page) {
  const element = document.querySelector("#pagination");
  const reviewList = document.querySelector("#reviews-list");
  let liTag = "";
  let active;
  let beforePage = page - 1;
  let afterPage = page + 1;
  if (page > 1) {
    liTag += `<li class="page-item" onclick="createPagination(totalPages, ${
      page - 1
    })"><a class="page-link">Previous</a></li>`;
  }

  if (page > 2) {
    liTag += `<li class="page-item" onclick="createPagination(totalPages, 1)"><a class="page-link">1</a></li>`;
    if (page > 3) {
      liTag += `<li class="page-item"><a class="page-link">...</a></li>`;
    }
  }

  for (var plength = beforePage; plength <= afterPage; plength++) {
    if (plength > totalPages) {
      continue;
    }
    if (plength == 0) {
      plength = plength + 1;
    }
    if (page == plength) {
      active = "active";
    } else {
      active = "";
    }
    liTag += `<li class="page-item  ${active}" onclick="createPagination(totalPages, ${plength})"><a class="page-link">${plength}</a></li>`;
  }

  if (page < totalPages - 1) {
    if (page < totalPages - 2) {
      liTag += `<li class="page-item"><a class="page-link">...</a></li>`;
    }
    liTag += `<li class="page-item" onclick="createPagination(totalPages, ${totalPages})"><a class="page-link">${totalPages}</a></li>`;
  }

  if (page < totalPages) {
    liTag += `<li class="page-item" onclick="createPagination(totalPages, ${
      page + 1
    })"><a class="page-link">Next</a></li>`;
  }
  element.innerHTML = liTag;
  $.ajax({
    url: `/Project/Api/api.php?id=${
      location.href.split("=")[1]
    }&showReviewPage=${page}`,
    method: "GET",
    success: function (data) {
      reviewList.innerHTML = data;
    },
    error: function (error) {
      console.error("Error fetching reviews:", error);
    },
  });
}
function createPagination2(totalPages, page) {
  const element = document.querySelector("#pagination");
  const reviewList = document.querySelector("#reviews-list");
  let liTag = "";
  let active;
  let beforePage = page - 1;
  let afterPage = page + 1;
  if (page > 1) {
    liTag += `<li class="page-item" onclick="createPagination2(totalPages, ${
      page - 1
    })"><a class="page-link">Previous</a></li>`;
  }

  if (page > 2) {
    liTag += `<li class="page-item" onclick="createPagination2(totalPages, 1)"><a class="page-link">1</a></li>`;
    if (page > 3) {
      liTag += `<li class="page-item"><a class="page-link">...</a></li>`;
    }
  }

  for (var plength = beforePage; plength <= afterPage; plength++) {
    if (plength > totalPages) {
      continue;
    }
    if (plength == 0) {
      plength = plength + 1;
    }
    if (page == plength) {
      active = "active";
    } else {
      active = "";
    }
    liTag += `<li class="page-item  ${active}" onclick="createPagination2(totalPages, ${plength})"><a class="page-link">${plength}</a></li>`;
  }

  if (page < totalPages - 1) {
    if (page < totalPages - 2) {
      liTag += `<li class="page-item"><a class="page-link">...</a></li>`;
    }
    liTag += `<li class="page-item" onclick="createPagination2(totalPages, ${totalPages})"><a class="page-link">${totalPages}</a></li>`;
  }

  if (page < totalPages) {
    liTag += `<li class="page-item" onclick="createPagination2(totalPages, ${
      page + 1
    })"><a class="page-link">Next</a></li>`;
  }
  element.innerHTML = liTag;
  $.ajax({
    url: `/Project/Api/api.php?id=${
      location.href.split("=")[1]
    }&showReviewBrandPage=${page}`,
    method: "GET",
    success: function (data) {
      reviewList.innerHTML = data;
    },
    error: function (error) {
      console.error("Error fetching reviews:", error);
    },
  });
}

$(document).ready(function () {
  $(".favorite-logo").click(function () {
    var currentFavorite = $(this).data("favorite");
    var vehicleID = $(this).data("vehicleid");
    var UserID = $(this).data("userid");
    var favoriteContainer = $(this);
    if (currentFavorite) {
      $.ajax({
        url: "/Project/Api/api.php",
        method: "POST",
        data: { VehicleID: vehicleID, deleteFavorite: 1, UserID: UserID },
        dataType: "json",
        success: function (data) {
          console.log(favoriteContainer);
          favoriteContainer.data("favorite", 0);
        },
        error: function (error) {
          console.error(error);
        },
      });
    } else {
      $.ajax({
        url: "/Project/Api/api.php",
        method: "POST",
        data: { VehicleID: vehicleID, addFavorite: 1, UserID: UserID },
        dataType: "json",
        success: function (data) {
          console.log(favoriteContainer);
          favoriteContainer.data("favorite", 1);
        },
        error: function (error) {
          console.error(error);
        },
      });
    }
    $(this).find(".heart-icon").toggleClass("show not-show");
  });

  if (location.href.split("=")[0] === "http://localhost/Project/review/?id") {
    $.ajax({
      url: `/Project/Api/api.php?getReviewsbyID=${location.href.split("=")[1]}`,
      method: "GET",
      dataType: "json",
      success: function (data) {
        totalPages = Math.ceil(data / 5);
        if (data != null) {
          createPagination(totalPages, page);
        }
      },
      error: function (error) {
        console.error("Error fetching reviews:", error);
      },
    });
  }
  if (
    location.href.split("=")[0] === "http://localhost/Project/review/brand/?id"
  ) {
    $.ajax({
      url: `/Project/Api/api.php?getReviewsBrandbyID=${
        location.href.split("=")[1]
      }`,
      method: "GET",
      dataType: "json",
      success: function (data) {
        totalPages = Math.ceil(data / 5);
        if (data != null) {
          createPagination2(totalPages, page);
        }
      },
      error: function (error) {
        console.error("Error fetching reviews:", error);
      },
    });
  }
  $(".status").on("change", function () {
    $(".status").each(function () {
      var selectedValue = $(this).val();
      var row = $(this).closest("select");

      row.css("background-color", "");

      if (selectedValue === "Approved") {
        row.css("background-color", "green");
      } else if (selectedValue === "Rejected") {
        row.css("background-color", "red");
      } else if (selectedValue === "Pending") {
        row.css("background-color", "grey");
      }
    });
  });

  for (let index = 1; index < 5; index++) {
    $("#vehicle_picker_brand" + index).on("change", function () {
      var selectedBrand = $(this).val();

      $.ajax({
        url: "/Project/Api/api.php",
        method: "POST",
        data: { brandID: selectedBrand },
        dataType: "json",
        success: function (models) {
          var modelDropdown = $("#vehicle_picker_model" + index);
          modelDropdown.empty();
          $("#vehicle_picker_year" + index).empty();
          $("#vehicle_picker_version" + index).empty();
          $("#vehicle_picker_year" + index).append(
            '<option value="" selected="">Choose a Year</option>'
          );
          $("#vehicle_picker_version" + index).append(
            '<option value="" selected="">Choose a Version</option>'
          );
          modelDropdown.append(
            '<option value="" selected="">Choose a Model</option>'
          );

          $.each(models, function (index, model) {
            modelDropdown.append(
              '<option value="' +
                model.ModelID +
                '">' +
                model.ModelName +
                "</option>"
            );
          });
        },
      });
    });
    $("#vehicle_picker_model" + index).on("change", function () {
      var selectedModel = $(this).val();
      $.ajax({
        url: "/Project/Api/api.php",
        method: "POST",
        data: { modelID: selectedModel },
        dataType: "json",
        success: function (models) {
          var yaarDropdown = $("#vehicle_picker_year" + index);
          yaarDropdown.empty();
          yaarDropdown.append(
            '<option value="" selected="">Choose a Year</option>'
          );
          $.each(models, function (index, model) {
            yaarDropdown.append(
              '<option value="' +
                model.ModelID +
                '">' +
                model.ModelYear +
                "</option>"
            );
          });
        },
      });
    });
    $("#vehicle_picker_model" + index).on("change", function () {
      var selectedModel = $(this).val();
      $.ajax({
        url: "/Project/Api/api.php?year=1&modelID=" + selectedModel,
        method: "GET",
        dataType: "json",
        success: function (infos) {
          var versionDropdown = $("#vehicle_picker_version" + index);
          versionDropdown.empty();
          versionDropdown.append(
            '<option value="" selected="">Choose a Version</option>'
          );

          $.each(infos, function (index, info) {
            versionDropdown.append(
              '<option value="' +
                info.VehicleID +
                '">' +
                info.Version +
                "</option>"
            );
          });
        },
      });
    });
  }
  $(".compare-button").on("click", function () {
    var selectedVersion1 = $("#vehicle_picker_version1").val();
    var selectedVersion2 = $("#vehicle_picker_version2").val();
    var selectedVersion3 = $("#vehicle_picker_version3").val();
    var selectedVersion4 = $("#vehicle_picker_version4").val();
    if (
      $("#vehicle_picker_brand1").val() === "" ||
      $("#vehicle_picker_model1").val() === "" ||
      $("#vehicle_picker_brand2").val() === "" ||
      $("#vehicle_picker_model2").val() === "" ||
      $("#vehicle_picker_version1").val() === "" ||
      $("#vehicle_picker_version2").val() === "" ||
      $("#vehicle_picker_year1").val() === "" ||
      $("#vehicle_picker_year2").val() === ""
    ) {
      alert("Please fill in the first two vehiculs to compare.");
      return;
    }

    var selectedVersions1 = [
      $("#vehicle_picker_version2").val(),
      $("#vehicle_picker_version3").val(),
      $("#vehicle_picker_version4").val(),
    ];
    var selectedVersions2 = [
      $("#vehicle_picker_version3").val(),
      $("#vehicle_picker_version4").val(),
    ];

    selectedVersions1.forEach(function (selectedVersion) {
      if (!selectedVersion) return;

      var comparisonData = {
        vehicleID1: selectedVersion1,
        vehicleID2: selectedVersion,
        comparison: 1,
      };

      $.ajax({
        url: "/Project/Api/api.php",
        type: "POST",
        data: comparisonData,
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
        error: function (error) {
          console.error("Error updating comparison:", error);
        },
      });
    });
    selectedVersions2.forEach(function (selectedVersion) {
      if (!selectedVersion) return;

      var comparisonData = {
        vehicleID1: selectedVersion2,
        vehicleID2: selectedVersion,
        comparison: 1,
      };

      $.ajax({
        url: "/Project/Api/api.php",
        type: "POST",
        data: comparisonData,
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
        error: function (error) {
          console.error("Error updating comparison:", error);
        },
      });
    });
    if (selectedVersion3 && selectedVersion4) {
      var comparisonData = {
        vehicleID1: selectedVersion3,
        vehicleID2: selectedVersion4,
        comparison: 1,
      };

      $.ajax({
        url: "/Project/Api/api.php",
        type: "POST",
        data: comparisonData,
        dataType: "json",
        success: function (data) {
          console.log(data);
        },
        error: function (error) {
          console.error("Error updating comparison:", error);
        },
      });
    }

    location.href =
      "/Project/compare/?vehicleID1=" +
      selectedVersion1 +
      "&vehicleID2=" +
      selectedVersion2;
    if (selectedVersion3 != "") {
      location.href =
        "/Project/compare/?vehicleID1=" +
        selectedVersion1 +
        "&vehicleID2=" +
        selectedVersion2 +
        "&vehicleID3=" +
        selectedVersion3;
    }
    if (selectedVersion4 != "") {
      location.href =
        "/Project/compare/?vehicleID1=" +
        selectedVersion1 +
        "&vehicleID2=" +
        selectedVersion2 +
        "&vehicleID3=" +
        selectedVersion3 +
        "&vehicleID4=" +
        selectedVersion4;
    }
  });
  $("#modalcompareButton").on("click", function () {
    var selectedVersion1 = $("#selectedVehicule").val();
    var selectedVersion2 = $("#vehicle_picker_version2").val();
    var selectedVersion3 = $("#vehicle_picker_version3").val();
    var selectedVersion4 = $("#vehicle_picker_version4").val();
    if (
      $("#vehicle_picker_brand2").val() === "" ||
      $("#vehicle_picker_model2").val() === "" ||
      $("#vehicle_picker_version2").val() === "" ||
      $("#vehicle_picker_year2").val() === ""
    ) {
      alert("Please fill at least in the second vehicul to compare.");
      return;
    }

    location.href =
      "/Project/compare/?vehicleID1=" +
      selectedVersion1 +
      "&vehicleID2=" +
      selectedVersion2;
    if (selectedVersion3 != "") {
      location.href += "&vehicleID3=" + selectedVersion3;
    }
    if (selectedVersion4 != "") {
      location.href += "&vehicleID4=" + selectedVersion4;
    }
  });

  const loadMoreBtn = $("#load-more-btn");
  const loadMoreGuidesBtn = $("#load-moreguides-btn");
  const newsContainer = $("#news-container");

  let nombre = 0;
  let nombre1 = 0;
  $.ajax({
    url: `/Project/Api/api.php?getNews=1`,
    method: "GET",
    dataType: "json",
    success: function (data) {
      nombre = parseInt(data.NumberOfNews);
    },
    error: function (error) {
      console.error("Error fetching news:", error);
    },
  });
  loadMoreBtn.on("click", function () {
    if (newsContainer[0].children.length < nombre) {
      fetchNews();
    } else {
      loadMoreBtn.remove();
    }
  });

  function fetchNews() {
    $.ajax({
      url: `/Project/Api/api.php?offset=${offset}&limit=${limit}`,
      method: "GET",
      dataType: "json",
      success: function (data) {
        appendNewsToContainer(data);
        offset = offset + limit;
      },
      error: function (error) {
        console.error("Error fetching news:", error);
      },
    });
  }
  $.ajax({
    url: `/Project/Api/api.php?getGuides=1`,
    method: "GET",
    dataType: "json",
    success: function (data) {
      nombre1 = data.NumberOfGuides;
    },
    error: function (error) {
      console.error("Error fetching guides:", error);
    },
  });
  loadMoreGuidesBtn.on("click", function () {
    if (newsContainer[0].children.length < nombre1) {
      fetchGuides();
    } else {
      loadMoreGuidesBtn.remove();
    }
  });

  function fetchGuides() {
    $.ajax({
      url: `/Project/Api/api.php?guides=1&offset=${offset}&limit=${limit}`,
      method: "GET",
      dataType: "json",
      success: function (data) {
        appendNewsToContainer(data);
        offset = offset + limit;
      },
      error: function (error) {
        console.error("Error fetching news:", error);
      },
    });
  }

  function appendNewsToContainer(newsData) {
    $.each(newsData, function (_, newsItem) {
      const newsCard = createNewsCard(newsItem);
      newsContainer.append(newsCard);
    });
  }

  function createNewsCard(newsItem) {
    const card = $("<a>", {
      href: `/Project/news/detail/?id=${newsItem["NewsID"]}`,
      class: "news-card",
    });

    const imageContainer = $("<div>");
    const image = $("<img>", {
      src: `/Project/public/images/${newsItem["ImagePath"]}`,
      alt: "",
    });
    imageContainer.append(image);

    const contentContainer = $("<div>");

    const shortenedTitle =
      newsItem["Title"].length > 32
        ? newsItem["Title"].substring(0, 32) + "..."
        : newsItem["Title"];
    const title = $("<h1>", { text: shortenedTitle });

    let shortenedContent =
      newsItem["Content"].length > 110
        ? newsItem["Content"].substring(0, 110) + "..."
        : newsItem["Content"];

    shortenedContent = shortenedContent.padEnd(110, " ");

    const paragraph = $("<p>", { text: shortenedContent });
    const publishedDate = $("<h3>", {
      text: `Published · ${formatDate(newsItem["Date"])}`,
    });

    contentContainer.append(title, paragraph, publishedDate);
    card.append(imageContainer, contentContainer);

    return card;
  }

  function formatDate(dateString) {
    const options = { day: "numeric", month: "short", year: "numeric" };
    const date = new Date(dateString);
    return date.toLocaleDateString("en-US", options);
  }

  var coll = document?.getElementsByClassName("collapsee");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i]?.addEventListener("click", function () {
      this.classList.toggle("active");
      console.log(this.children);
      var content = this.nextElementSibling;
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        this.children[1].class = "bi bi-dash-lg";
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
        this.children[1].class = "bi bi-plus-lg";
      }
    });
  }

  let stars = document.querySelectorAll(".rating-star");

  stars?.forEach(function (star, index) {
    star.addEventListener("click", function () {
      $("#note").val(index + 1);
      console.log(note.value);
      for (var i = 0; i <= index; i++) {
        stars[i].setAttribute("fill", "orange");
      }
      for (var i = index + 1; i <= stars.length; i++) {
        stars[i].setAttribute("fill", "currentColor");
      }
    });
  });

  document
    ?.getElementById("ReviewSubmitButton")
    ?.addEventListener("click", function () {
      var review = document.getElementById("review").value;
      var note = document.getElementById("note").value;

      if (review.trim() === "") {
        alert("Please enter your review");
        return;
      }

      if (note === "0") {
        alert("Please select a note");
        return;
      }
      var formElement = document.getElementById("reviewForm");
      var formData = new FormData(formElement);
      $.ajax({
        url: "/Project/Api/api.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
          alert(data);
        },
        error: function (error) {
          console.log(error);
        },
      });
    });

  $("#vehiculeSelect").on("change", function () {
    var selectedID = $(this).val();
    console.log(selectedID);
    $.ajax({
      url: "/Project/Api/api.php?vehiculeDetailsID=" + selectedID,
      method: "GET",
      success: function (data) {
        var vehiculeDetails = $("#vehicule-details-brand");
        vehiculeDetails.empty();
        vehiculeDetails.append(data);
        var coll = document?.getElementsByClassName("collapsee");
        var i;

        for (i = 0; i < coll.length; i++) {
          coll[i]?.addEventListener("click", function () {
            this.classList.toggle("active");
            console.log(this.children);
            var content = this.nextElementSibling;
            if (content.style.maxHeight) {
              content.style.maxHeight = null;
              this.children[1].class = "bi bi-dash-lg";
            } else {
              content.style.maxHeight = content.scrollHeight + "px";
              this.children[1].class = "bi bi-plus-lg";
            }
          });
        }
      },
    });
  });

  $("#updateNewsForm").on("submit", function (e) {
    e.preventDefault();

    var updatedImages = [];

    $(".card-img").each(function () {
      var imgFilename = $(this).data("imgsrc");
      console.log(imgFilename);
      updatedImages.push(imgFilename);
    });

    $("#updatedImages").val(updatedImages.join(","));
    var formElement = document.getElementById("updateNewsForm");
    var formData = new FormData(formElement);

    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (data) {
        alert("News updated successfully");
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $("#AddSocialMediaForm").on("submit", function (e) {
    e.preventDefault();
    var formElement = document.getElementById("AddSocialMediaForm");
    var formData = new FormData(formElement);

    $.ajax({
      url: "/Project/Api/api.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (data) {
        var mediaContainer = $(
          "<div class='media-container'>" +
            '<a href="' +
            data[1] +
            '">' +
            '<img src="/Project/public/images/' +
            data[2] +
            '" alt="' +
            data[2] +
            '">' +
            "</a>" +
            "<div>" +
            "<h3>" +
            data[0] +
            "</h3>" +
            "</div>" +
            '<h5 class="delete-media" style="color: red; margin-top: -10px; cursor: pointer;">Delete</h5>' +
            '<input type="hidden" name="mediaID" value="' +
            data[3] +
            '">' +
            '<input type="hidden" name="ImageID" value="' +
            data[4] +
            '">' +
            "</div>"
        );
        $(".social-media").append(mediaContainer);

        mediaContainer.find(".delete-media").on("click", function () {
          var mediaId = $(this).siblings('input[name="mediaID"]').val();
          var ImageID = $(this).siblings('input[name="ImageID"]').val();

          var mediaContainer = $(this).closest(".media-container");
          var imagePath = mediaContainer
            .find("img")
            .attr("src")
            .split("/")
            .pop();
          if (confirm("Are you sure you want to delete this image?")) {
            $.ajax({
              type: "POST",
              url: "/Project/Api/api.php",
              data: {
                mediaId: mediaId,
                deletMedia: 1,
                imagePath: imagePath,
                ImageID: ImageID,
              },
              success: function (response) {
                mediaContainer.remove();
              },
              error: function (error) {
                console.error("Error deleting media:", error);
              },
            });
          }
        });
      },
      error: function (error) {
        console.log("Error adding social media", error);
      },
    });
  });

  $(".delete-media").on("click", function () {
    var mediaId = $(this).siblings('input[name="mediaID"]').val();
    var ImageID = $(this).siblings('input[name="ImageID"]').val();

    var mediaContainer = $(this).closest(".media-container");
    var imagePath = mediaContainer.find("img").attr("src").split("/").pop();
    if (confirm("Are you sure you want to delete this image?")) {
      $.ajax({
        type: "POST",
        url: "/Project/Api/api.php",
        data: {
          mediaId: mediaId,
          deletMedia: 1,
          imagePath: imagePath,
          ImageID: ImageID,
        },
        success: function (response) {
          mediaContainer.remove();
        },
        error: function (error) {
          console.error("Error deleting media:", error);
        },
      });
    }
  });

  $("#SlideType").on("change", function () {
    var selectedSlideType = $(this).val();

    if (selectedSlideType === "News") {
      $("#SlideNews").show();
      $("#SlideAd").hide();
    } else if (selectedSlideType === "Ad") {
      $("#SlideNews").hide();
      $("#SlideAd").show();
    } else {
      $("#SlideNews").hide();
      $("#SlideAd").hide();
    }
  });
  $("#AddDiapo").on("submit", function (e) {
    e.preventDefault();
    var selectedSlideType = $("#SlideType").val();
    var selectedNews = $("#News").val();
    var url = $("#Slideimage").val();
    var image = $("#Slideimage").val();

    if (selectedSlideType === "News") {
      if (!selectedNews || selectedNews === "pub") {
        alert("Please choose a News to Add.");
        return;
      }
    } else if (selectedSlideType === "Ad") {
      if (!url || !image) {
        alert("Please fill in the URL and Image fields for the Ad.");
        return;
      }
    } else {
      alert("Please select type of slide.");
      return;
    }
    $("#AddDiapo").off("submit");
    $("#AddDiapo").submit();
  });

  $(".deleteSlide").on("click", function () {
    var slideID = $(this).data("slide-id");
    var slidePath = $(this).data("slide-path");

    if ($(".card").length > 1) {
      if (confirm("Are you sure you want to delete this slide?")) {
        $.ajax({
          url: "/Project/Api/api.php",
          method: "POST",
          data: { slideID, slidePath, deleteSlide: 1 },
          dataType: "json",
          success: function (data) {
            $("#slide" + slideID).remove();
            console.log("#slide" + slideID);
            swiper.update();
          },
          error: function (error) {
            console.error("Error deleting entry", error);
          },
        });
      }
    } else {
      alert("Diaporama can't have 0 images");
    }
  });

  $(".newsCard .bi-x-circle-fill").on("click", function () {
    var card = $(this).closest(".card");
    var imgSrc = card.find(".card-img").attr("src");
    var imgFilename = imgSrc.substring(imgSrc.lastIndexOf("/") + 1);
    var id = $("#NewsID").val();

    if ($(".card").length > 1) {
      if (confirm("Are you sure you want to delete this image?")) {
        $.ajax({
          url: "/Project/Api/api.php",
          method: "POST",
          data: { deleteNewsImage: imgFilename, id: id },
          dataType: "json",
          success: function (data) {
            card.remove();
          },
          error: function (error) {
            console.log("error", error);
          },
        });
      }
    } else {
      alert("News can't have 0 images");
    }
  });

  $("#images").on("change", function (e) {
    var files = e.target.files;
    var inputFiles = [...files];

    for (var i = 0; i < files.length; i++) {
      var reader = new FileReader();
      var fileName = inputFiles[i].name;
      reader.onload = function (event) {
        var imgSrc = event.target.result;
        var newCard = $(
          '<div class="card swiper-slide">' +
            '<img src="' +
            imgSrc +
            '" alt="" class="card-img" ' +
            "data-imgSrc=" +
            fileName +
            " >" +
            "</div>"
        );
        var newImage = $(
          '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-circle-fill delete-image" viewBox="0 0 16 16">' +
            '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />' +
            "</svg>"
        );
        newImage.on("click", function () {
          var card = $(this).closest(".card");
          var imgSrc = card.find(".card-img").attr("src");
          var imgFilename = imgSrc.substring(imgSrc.lastIndexOf("/") + 1);
          var id = $("#NewsID").val();

          if ($(".card").length > 1) {
            if (confirm("Are you sure you want to delete this image?")) {
              $.ajax({
                url: "/Project/Api/api.php",
                method: "POST",
                data: { deleteNewsImage: imgFilename, id: id },
                dataType: "json",
                success: function (data) {
                  card.remove();
                },
                error: function (error) {
                  console.log("error", error);
                },
              });
            }
          } else {
            alert("News can't have 0 images");
          }
        });
        newCard.append(newImage);

        $(".card-wrapper").append(newCard);
      };
      reader.readAsDataURL(files[i]);
    }
  });
  $("#BrandLogo").on("change", function () {
    var file = this.files[0];

    if (file) {
      var reader = new FileReader();

      reader.onload = function (e) {
        var image = $("<img>").attr("src", e.target.result);

        $(".BrandLogoCard").html(image);
      };

      reader.readAsDataURL(file);
    } else {
      $(".BrandLogoCard").html("");
    }
  });

  $(document).on("click", ".delete-image", function () {
    var card = $(this).closest(".card");
    card.remove();
  });

  $(".delete-favorite-logo").on("click", function () {
    var vehicleID = $(this).data("vehicleid");
    var userID = $(this).data("userid");

    deleteItem(vehicleID, userID);
  });
  var table = $("#table").DataTable({
    search: true,
    searchPanes: true,
  });
  table.searchPanes.container().prependTo(table.table().container());
  table.searchPanes.resizePanes();

  $(".dtsp-collapseAll").click();
});
