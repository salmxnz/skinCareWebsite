<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:skin="http://www.skincare.com/products">

  <xsl:template match="/">
    <div class="shop__container">
      <xsl:for-each select="skin:products/skin:product">
        <article class="shop__card" data-price="{skin:price}" data-category="{translate(skin:category, ' ', '')}">
          <div class="shop__box">
            <img src="{skin:image}" alt="{skin:name}" class="shop__img"/>
          </div>
          <div class="shop__details">
            <h3 class="shop__title"><xsl:value-of select="skin:name"/></h3>
            <p class="shop__description"><xsl:value-of select="skin:description"/></p>

            <!-- Display product options if available -->
            <xsl:if test="skin:options">
              <div class="shop__options">
                <xsl:for-each select="skin:options/skin:option">
                  <span class="shop__option"><xsl:value-of select="."/></span>
                </xsl:for-each>
              </div>
            </xsl:if>

            <div class="shop__price_container">
            <xsl:if test="skin:discountPrice">
              <span class="discount">$<xsl:value-of select="skin:discountPrice"/></span>
            </xsl:if>
            <span class="shop__price">$<xsl:value-of select="skin:price"/></span>
          </div>

            
            <a href="details.php?id={@id}" class="shop__button">
               <img src="assets/icons/cart.png" alt="Cart" class="shop__icon"/>
            </a>
          </div>
          <!-- New tag outside of shop__details -->
          <xsl:if test="skin:isNew = 'true'">
            <div class="shop__tag shop__tag--new">New</div>
          </xsl:if>
          <xsl:if test="skin:isBest = 'true'">
            <div class="shop__tag shop__tag--best">Best</div>
          </xsl:if>
        </article>
      </xsl:for-each>
    </div>
  </xsl:template>
</xsl:stylesheet>