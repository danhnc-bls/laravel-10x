/**
 * Render pagination HTML
 * 
 * @param {Object} pagination
 * @param {int} pagination.current_page - current page.
 * @param {int} pagination.limit - limit page
 * @param {int} pagination.total - total data
 * @param {int} pagination.total_pages - total pages
 * @param {string} change
 * 
 * @return {string} HTML
 */
function pagination(pagination, change){
    let pageHtml = '';
    for (let page = 1; page <= pagination.total_pages; page++) {
        pageHtml = `${pageHtml}<li class="page-item ${page == pagination.current_page ? 'active' : ''}">
            <button type="button" class="page-link" onclick="${change}(${Number(page)})">${page}</button>
        </li>`;
    }

    let previousHtml = '<li class="page-item"><button type="button" class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
    const previous = (Number(pagination.current_page) > 1) ? (Number(pagination.current_page) - 1) : null;
    if (previous) {
        previousHtml = `<li class="page-item">
            <button type="button" class="page-link" onclick="${change}(${previous})" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>`;
    }

    let nextHtml = '<li class="page-item"><button type="button" class="page-link" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
    const next = (Number(pagination.current_page) < Number(pagination.total_pages)) ? (Number(pagination.current_page) + 1) : null;
    if (next) {
        nextHtml = `<li class="page-item">
            <button type="button" class="page-link" onclick="${change}(${next})" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>`;
    }

    return `<nav aria-label="Page navigation">
        <ul class="pagination">
            ${previousHtml}
            ${pageHtml}
            ${nextHtml}
        </ul>
    </nav>`;
}